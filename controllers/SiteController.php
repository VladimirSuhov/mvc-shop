<?php


class SiteController
{
    public function actionIndex() {

        $categoryList = array();
        $categoryList = Category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(3);

        include_once ROOT . '/views/site/index.php';

        return true;
    }

    public function sendMail() {

    }

    public function actionContact() {
        $name = "";
        $email = "";
        $subject = "";
        $message = "";

        if(isset($_POST['submit'])) {
            $userName = $_POST['name'];
            $userEmail = $_POST['email'];
            $userSubject = $_POST['subject'];
            $userMessage = $_POST['message'];

            $errors = false;

            if(!User::checkName($userName)) {
                $errors[] = "Имя не должно быть короче 2 символов.";
            }

            if(!User::checkEmail($userEmail)) {
                $errors[] = "Неправильный Email.";
            }

            if($errors == false) {
                $to = 'vladimir.s.sukhov@gmail.com';
                $mail = $userEmail;
                $subject = $userSubject;
                $message = $userMessage;
                $headers = '<p>From: ' .$userName. '</p>'
                            . '<p>Email: ' .$userEmail. '</p>';

                $result = mail($to, $subject, $message, $headers);
                $result = true;
            }
        }
        include_once ROOT . '/views/pages/contacts.php';

        return true;
    }

}