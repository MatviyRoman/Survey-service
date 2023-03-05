<?php
require_once 'models/Survey.php';
require_once 'models/User.php';

class SurveyController extends AuthController
{
    public static function index()
    {
        $surveys = Survey::findByUserId(User::info()->id);

        require_once 'views/survey/index.php';
    }

    public static function view($id)
    {
        $survey = Survey::findById($id);

        require_once 'views/survey/view.php';
    }


    public static function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $question = $_POST['question'];
            $answers  = $_POST['answers'];
            $status   = $_POST['status'];

            $errors = self::handleForm($question, $answers, $status);
        }

        require_once 'views/survey/create.php';
    }

    public static function edit($id)
    {
        $survey = Survey::findById($id);

        if (!$survey) {
            return self::redirectToSurveys();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $question = $_POST['question'];
            $answers  = $_POST['answers'];
            $status   = $_POST['status'];

            $errors = self::handleForm($question, $answers, $status, $id);
        }

        require_once 'views/survey/edit.php';
    }

    public static function delete($id)
    {
        if (!$id) {
            return self::redirectToHome();
        }

        $survey = Survey::findById($id);

        if (!$survey) {
            return self::redirectToSurveys();
        }

        if (Survey::delete($survey->id)) {
            return self::redirectToSurveys();
        }

        return self::redirectToHome();
    }

    public static function random()
    {
        if (isset($_POST['email']) && $_POST['password']) {
            self::auth($_POST['email'], $_POST['password']);
        }

        if (!isset($_SESSION['user'])) {
            http_response_code(401);
            echo json_encode(['error' => 'Unauthorized']);
            exit();
        }

        $survey = (array) Survey::findRandomPublishedByUser(User::info()->id);

        if (empty($survey)) {
            http_response_code(404);
            echo json_encode(['error' => 'Not Found']);
            exit();
        }

        $data = [
            'question' => $survey['question'],
            'answers' => []
        ];

        foreach ($survey['options'] as $option) {
            $data['answers'][] = [
                'text' => $option['answer'],
                'votes' => $option['votes']
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($data);

        exit();
    }

    private static function handleForm($question, $answers, $status, $id = null)
    {
        $errors = [];

        if (empty($question)) {
            $errors[] = 'Question is required';
        }

        if (count($answers) < 2) {
            $errors[] = 'At least two answers are required';
        }

        foreach ($answers as $answer) {
            if (empty($answer)) {
                $errors[] = 'Answer is required';
                break;
            }
        }

        if (!in_array($status, ['draft', 'published'])) {
            $errors[] = 'Invalid status';
        }

        if (empty($errors)) {
            $survey = new Survey($question, $answers, $status, $id);
            $survey->save();
            return self::redirectToSurveys();
        }

        return $errors;
    }
}
