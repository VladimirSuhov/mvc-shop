<?php

class CatalogController
{
    public function actionIndex() {

        $categoryList = array();
        $categoryList = Category::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(12);

        include_once ROOT . '/views/catalog/index.php';

        return true;
    }

    public  function actionCategory($categoryId, $page = 1) {

        $categoryList = array();
        $categoryList = Category::getCategoriesList();

        $categoryProducts = array();
        $categoryProducts = Product::getProductsListByCategoryId($categoryId, $page, 2);

        $total = Product::getTotalProductsInCategory($categoryId);

        // Create an obj Pagination

        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, '');

        include_once ROOT . '/views/catalog/category.php';

        return true;
    }
}