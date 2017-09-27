<?php
include_once ROOT . '/models/News.php';
class NewsController {

    // Returns a news list
    public function actionIndex() {
        $newsList = array();
        $newsList = News::getNewsList();

        require_once ROOT . '/views/news/index.php';

        return true;
    }
    // Displays single news post
    public function actionView($id) {

        if($id) {
            $newsItem = News::getNewsItemById($id);
            require_once ROOT . '/views/news/view.php';
        }

        return true;
    }
}

