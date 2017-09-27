<?php

include_once ROOT . '/models/Category.php';
include_once ROOT . '/models/Product.php';
class CatalogController
{
    public static function actionIndex() {

        $categoryList = array();
        $categoryList = Category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(12);

        include_once ROOT . '/views/catalog/index.php';

        return true;
    }

    public static function actionCategory($categoryId) {
        $categoryList = array();
        $categoryList = Category::getCategoriesList();

        $categoryProducts = array();
        $categoryProducts = Product::getProductsListByCategoryId($categoryId);

        include_once ROOT . '/views/catalog/category.php';

        return true;
    }
}