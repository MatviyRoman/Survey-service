<?php

class User extends Db
{
    public $email;
    public $password;
    public $errors = [];


    public static function login($email, $password)
    {
        $user = static::findByEmail($email);

        if (isset($user) && isset($user['password']) && password_verify(PASSWORD_SALT . $password, $user['password'])) {
            $user_info = new stdClass();
            $user_info->id = $user['id'];
            $user_info->email = $user['email'];
            $user_info->password = $user['password'];
            $user_info->created_at = $user['created_at'];
            $user_info->updated_at = $user['updated_at'];

            $_SESSION['user'] = serialize($user_info);

            return $user;
        } else {
            return false;
        }
    }

    public static function info() {
        if(isset($_SESSION['user'])) {
            $user = unserialize($_SESSION['user']);

            return $user;
        }

        return false;
    }

    public static function findById($id) {
        $user = R::findOne( 'users', ' id = ? ', [ $id ] );

        if(!$user) {
            return self::$errors['id'] = 'This user not found';
        }

        return $user;
    }

    public static function findByEmail($email) {
        $user = R::findOne( 'users', ' email = ? ', [ $email ] );

        if(!$user) {
            return self::$errors['email'] = 'This email not found';
        }

        return $user;
    }

    public function save()
    {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $user = R::findOne( 'users', ' email = ? ', [ $email ] );

        if($user) {
            $this->errors['email'] = 'This email is exist';
            return false;
        }

        $user = R::dispense('users');
        $user->email = $email;
        $user->password = password_hash(PASSWORD_SALT . $password, PASSWORD_DEFAULT);
        $user_id = R::store($user);

        if($user_id) {
            $user = R::findOne( 'users', 'id = ? ', [ $user_id ] );

            $user_info = new stdClass();
            $user_info->id = $user['id'];
            $user_info->email = $user['email'];
            $user_info->password = $user['password'];
            $user_info->created_at = $user['created_at'];
            $user_info->updated_at = $user['updated_at'];

            $_SESSION['user'] = serialize($user_info);

            return true;
        }

        return false;
    }
}
