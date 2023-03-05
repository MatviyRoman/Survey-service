<?php
session_start();

//! Load config
require_once 'config/app.php';
require_once 'models/Db.php';

//! Load controllers
require_once 'controllers/Controller.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/SurveyController.php';
require_once 'controllers/DashboardController.php';

$page = $_GET['page'] ?? false;

if ($page) {
    switch ($page) {
        case 'api/random':
            SurveyController::random();
            break;
    }

    if (isset($_SESSION['user'])) {
        //! Route for user auth
        if (isset($_GET['id'])) {
            $id = (int) $_GET['id'];

            switch ($page) {
                case ($page.$id === 'survey/edit/'. $id):
                    SurveyController::edit($id);
                    break;
                case ($page.$id === 'survey/delete/'. $id):
                    SurveyController::delete($id);
                    break;
                case ($page.$id === 'survey/view/'. $id):
                    SurveyController::view($id);
                    break;
                default:
                    Controller::notFound();
                    break;
            }
        } elseif ($page) {
            switch ($page) {
                case 'logout':
                    AuthController::logout();
                    break;
                case 'dashboard':
                    DashboardController::index();
                    break;
                case 'survey/create':
                    SurveyController::create();
                    break;
                case 'surveys':
                    SurveyController::index();
                    break;
                default:
                    Controller::notFound();
                    break;
            }
        }

    } else {
        //! Route for user guest
        switch ($page) {
            case 'index':
                AuthController::login();
                break;
            case 'login':
                AuthController::login();
                break;
            case 'register':
                AuthController::register();
                break;
            default:
                Controller::notFound();
                break;
        }
    }
}

if (!$page) {
    if (isset($_SESSION['user'])) {
        //! Route for user auth
        DashboardController::index();
    } else {
        //! Route for user guest
        AuthController::login();
    }
}
