<?php

    class NewsController {

        // Returns a news list
        public function actionIndex() {
            echo 'Список новостей';
            return true;
        }
        // Displays single news post
        public function actionView() {
            echo 'Просмотр одной новости';
            return true;
        }
    }