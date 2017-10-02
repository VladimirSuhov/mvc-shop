<?php

/**
 * Created by PhpStorm.
 * User: Vova
 * Date: 02.10.2017
 * Time: 18:03
 */
class UserController
{

    public function actionRegister()
    {
        $name = '';
        $email = '';
        $password = '';

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
}