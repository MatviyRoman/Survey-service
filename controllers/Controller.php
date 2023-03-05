<?php
require_once 'config/functions.php';

class Controller
{
    protected static function redirectToLogin()
    {
        header('Location: /login');
        exit();
    }

    protected static function redirectToDashboard()
    {
        header('Location: /dashboard');
        exit();
    }
    protected static function redirectToHome()
    {
        header('Location: /');
        exit();
    }

    protected static function redirectToSurveys()
    {
        header('Location: /surveys');
        exit();
    }

    public static function notFound()
    {
        http_response_code(404);
        echo '404 Not Found<br><a href="/">Back to Home</a>';
    }
}
