<?php

class UserController
{

    public function actionRegister()
    {
        $name = '';
        $email = '';
        $password = '';
        $result = '';

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $errors = false;
            if(!User::checkName($name)) {
                $errors[] = "Имя не должно быть короче 2 символов.";
            }

            if(!User::checkEmail($email)) {
                $errors[] = "Неправильный Email.";
            }

            if(!User::checkPassword($password)) {
                $errors[] = "Пароль не должен быть короче 6-ти символов.";
            }

            if(User::checkEmailExsists($email)) {
                $errors[] = "Такой email уже существует.";
            }

            if ($errors == false) {
                $result = User::register($name, $email, $password);
            }
        }
        require_once(ROOT . '/views/user/register.php');

        return true;
    }

    public function actionLogin() {
        $email='';
        $password = '';

        if(isset($_POST['submit'])) {

            $email = $_POST['email'];

            $password = $_POST['password'];

            $errors = false;

            if(!User::checkEmail($email)) {
                $errors[] = 'Неправильный пароль';
            }
            if(!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6 ти символов';
            }

            $userId = User::checkUserData($email, $password);

            if($userId == false) {
                $errors[] = 'Неправильный логин или пароль';
            } else {
                User::auth($userId);

                header("location:/account");
            }

        }
        require_once ROOT . '/views/user/login.php';
    }

    public function actionLogout() {
        unset($_SESSION['user']);

        header("location:/");
    }
}