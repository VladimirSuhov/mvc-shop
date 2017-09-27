<?php

include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';
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