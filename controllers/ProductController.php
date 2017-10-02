<?php


class ProductController {

    public function actionView($productId) {

        $categoryList = array();
        $categoryList = Category::getCategoriesList();

        $product = Product::getProductById($productId);

        include_once ROOT . '/views/products/product.php';
        return true;
    }

}