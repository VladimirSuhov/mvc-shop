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
}