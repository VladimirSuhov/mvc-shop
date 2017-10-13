<?php

/**
 * Created by PhpStorm.
 * User: Vova
 * Date: 13.10.2017
 * Time: 11:21
 */
class Cart
{

    public static function getTotalPrice($products) {
        $productsInCart  = self::getProducts();

        $total = 0;

        if ($productsInCart) {
            foreach ($products as $item) {
                $total += $item['price'] * $productsInCart[$item['id']];
            }
        }
        return $total;
    }

    public static function getProducts() {
        if(isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }
        return false;
    }

    public static function addProduct($id) {
        $id = intval($id);

        //Empty array for products in cart
        $productInCart = array();

        //if there is some products in cart, they store in session
        if(isset($_SESSION['products'])) {
            // fill our product array
            $productInCart = $_SESSION['products'];
        }

        //if product already in cart, increase its quantity
        if(array_key_exists($id, $productInCart)) {
            $productInCart[$id] ++;
        } else {
            //add new product in array
            $productInCart[$id] = 1;
        }

        $_SESSION['products'] = $productInCart;

        return self::countItems();
    }

    public static function countItems() {
        if(isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            return 0;
        }
    }
}