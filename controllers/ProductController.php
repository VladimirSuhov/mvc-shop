<?php

class ProductController {

    public function actionIndex() {
        echo 'ProductController, actionIndex';
        return true;
    }

    public function actionView($id) {

        include_once ROOT . '/views/products/product.php';
        return true;
    }

}