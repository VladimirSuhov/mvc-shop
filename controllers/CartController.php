<?php

/**
 * Created by PhpStorm.
 * User: Vova
 * Date: 13.10.2017
 * Time: 11:18
 */
class CartController
{

    public function actionIndex() {

        $categories = array();
        $categories = Category::getCategoriesList();

        $productsInCart = false;

        //get products from cart
        $productsInCart = Cart::getProducts();

        if ($productsInCart) {
            // get info about products for list
            $productsIds = array_keys($productsInCart);

            $products = Product::getProductsByIds($productsIds);

            //get total price

            $totalPrice = Cart::getTotalPrice($products);
        }

        require_once ROOT . '/views/checkout/cart.php';
        return true;
    }

    public function actionAdd($id) {
        //add product
        Cart::addProduct($id);
        $refferer = $_SERVER['HTTP_REFERER'];
        header("location: $refferer");
    }

    public function actionAddAjax($id) {
        //add product

        echo Cart::addProduct($id);

        return true;
    }
}