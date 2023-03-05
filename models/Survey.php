<?php

require_once 'models/Option.php';
require_once 'models/User.php';

class Survey extends Db
{
    public $id;
    public $question;
    public $answers;
    public $status;

    public function __construct($question, $answers, $status, $id = null)
    {
        $this->id = (int) $id;
        $this->question = htmlspecialchars($question);
        $this->answers = $answers;
        $this->status = htmlspecialchars($status);
    }

    public static function findAll()
    {
        $surveys = R::findAll('surveys');
        foreach ($surveys as $survey) {
            $options = Option::findAllBySurveyId($survey->id);
            $survey->options = $options;
        }

        return $surveys;
    }

    public static function findById($id)
    {
        $survey = R::findOne('surveys', 'id = ? AND user_id = '. User::info()->id, [$id]);

        if($survey) {
            $options = Option::findAllBySurveyId($survey['id']);
            $survey['options'] = $options;
        }

        return $survey;
    }

    public static function findByUserId($user_id)
    {
        $surveys = R::getAll('SELECT * FROM surveys WHERE user_id = :user_id', [':user_id' => $user_id]);
        $surveys_arr = [];

        foreach ($surveys as $survey) {
            $options = Option::findAllBySurveyId($survey['id']);

            if($options) {
                $survey['options'] = $options;
            }

            $surveys_arr[] = $survey;
        }

        return $surveys_arr;
    }

    public static function findRandomPublishedByUser($user_id)
    {
        if($user_id) {
            $surveys = R::getAll('SELECT * FROM surveys WHERE user_id = :user_id AND status = "published" ORDER BY RAND() LIMIT 1', [':user_id' => $user_id]);

            foreach ($surveys as &$survey) {
                $options = Option::findAllBySurveyId($survey['id']);
                $survey['options'] = $options;
            }
            $surveys = $surveys[0];

            return $surveys;
        }

        return false;
    }

    public static function findPublishedByUser($user_id)
    {
        if($user_id) {
            $surveys = R::getAll('SELECT * FROM surveys WHERE user_id = :user_id AND status = "published"', [':user_id' => $user_id]);

            foreach ($surveys as &$survey) {
                $options = Option::findAllBySurveyId($survey['id']);
                $survey['options'] = $options;
            }

            return $surveys;
        }

        return false;
    }

    public function save()
    {
        $survey = $this->id ? R::load('surveys', $this->id) : R::dispense('surveys');
        $survey->question = $this->question;
        $survey->user_id = User::info()->id;
        $survey->status = $this->status;

        if ($this->id) {
            $survey->updated_at = Now();
        } else {
            $survey->created_at = $survey->updated_at = Now();
        }

        $survey_id = R::store($survey);

        if($survey_id) {
            $count_answers_update = \count($this->answers);

            if($this->id) {
                $count_answers_current = count(Option::findAllBySurveyId($survey_id));

                if($count_answers_update !== $count_answers_current) {
                    foreach(Option::findAllBySurveyId($survey_id) as $option) :
                        Option::delete($option['id']);
                    endforeach;
                }
            }

            if(!$this->id || $count_answers_update !== $count_answers_current) {
                foreach ($this->answers as $i => $answer) {
                    $option = new Option($survey_id, htmlspecialchars($answer));
                    if($option->save()) {
                        if($count_answers_update === $i) {
                            return true;
                        }
                    }
                }
            }

            return false;
        }

        return false;
    }

    public static function delete($id)
    {
        $survey = R::load('surveys', $id);

        if(R::trash($survey)) {
            return true;
        }

        return false;
    }
}
