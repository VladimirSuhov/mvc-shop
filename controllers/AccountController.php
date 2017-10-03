<?php

/**
 * Created by PhpStorm.
 * User: Vova
 * Date: 03.10.2017
 * Time: 1:42
 */
class AccountController
{

        public function actionIndex() {

            require_once ROOT . '/views/user/account.php';
            return true;
        }
}