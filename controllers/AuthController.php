<?php
require_once 'models/User.php';

class AuthController extends Controller
{
    protected static function auth($email, $password) {
        if ($email && $password) {
            $email = htmlspecialchars($email);
            $password = htmlspecialchars($password);

            $is_login = User::login($email, $password);

            if($is_login) {
                return true;
            } else {
                session_unset();
                session_destroy();
            }
        }

        return false;
    }

    public static function login()
    {
        if (isset($_SESSION['user'])) {
            return self::redirectToDashboard();
        }

        if(isset($_POST['email']) && $_POST['password']) {
            if(self::auth($_POST['email'], $_POST['password'])) {
                return self::redirectToDashboard();
            } else {
                $errors['email'] = 'Invalid email';
                $errors['password'] = 'Invalid password';
            }
        }

        require_once 'views/auth/login.php';
    }

    public static function register()
    {
        if (isset($_SESSION['user'])) {
            return self::redirectToDashboard();
        }

        if (isset($_POST['email']) && isset($_POST['password'])) {

            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;

            $user = new User();
            $user->email = $email;
            $user->password = $password;
            if(!$user->save() && $user->errors) {
                $errors = $user->errors;

                require_once 'views/auth/register.php';
                return;
            }

            unset($_SESSION['email'], $_SESSION['password']);

            return self::redirectToDashboard();
        }

        $email = isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : false;
        $password = isset($_SESSION['password']) ? htmlspecialchars($_SESSION['password']) : false;

        require_once 'views/auth/register.php';
    }

    public static function logout()
    {
        session_unset();
        session_destroy();
        return self::redirectToLogin();
    }
}
