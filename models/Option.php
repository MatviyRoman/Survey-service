<?php

class Option extends Db
{
    public $survey_id;
    public $answer;
    public $votes;

    public function __construct($survey_id, $answer, $votes = 0)
    {
        $this->survey_id = $survey_id;
        $this->answer = $answer;
        $this->votes = $votes;
    }

    public function save()
    {
        $option = R::dispense('options');
        $option->survey_id = $this->survey_id;
        $option->answer = $this->answer;
        $option->votes = $this->votes;

        $option_id = R::store($option);

        if($option_id) {
            return true;
        }

        return false;
    }

    public static function findAllBySurveyId($survey_id)
    {
        $options = R::getAll('SELECT * FROM options WHERE survey_id = :survey_id', [':survey_id' => $survey_id]);

        return $options;
    }

    public static function delete($id)
    {
        $options = R::load('options', $id);
        if(R::trash($options)) {
            return true;
        }
        return false;
    }
}
