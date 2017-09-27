<?php

class Product
{

    const SHOW_BY_DEFAULT = 10;

    /*
     * Returns array of products
     */

    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT) {

        $count = intval($count);

        $db = DB::getConnection();

        $productslist = array();

        $result = $db->query('SELECT id, name, price, image, is_new FROM product '
            . 'WHERE status = "1" '
            . 'ORDER BY id DESC '
            . 'LIMIT ' . $count
        );

        $i = 0;

        while ($row = $result->fetch()) {
            $productslist[$i]['id'] = $row['id'];
            $productslist[$i]['name'] = $row['name'];
            $productslist[$i]['price'] = $row['price'];
            $productslist[$i]['image'] = $row['image'];
            $productslist[$i]['is_new'] = $row['is_new'];

            $i++;
        }

        return $productslist;

    }

    public static function getProductsListByCategoryId($categoryId) {

        $db = DB::getConnection();

        $productslist = array();

        $result = $db->query('SELECT id, name, price, image, is_new FROM product '
            . 'WHERE status = "1" AND category_id=' . $categoryId
            . 'ORDER BY id DESC '
        );

        $i = 0;

        while ($row = $result->fetch()) {
            $productslist[$i]['id'] = $row['id'];
            $productslist[$i]['name'] = $row['name'];
            $productslist[$i]['price'] = $row['price'];
            $productslist[$i]['image'] = $row['image'];
            $productslist[$i]['is_new'] = $row['is_new'];

            $i++;
        }

        return $productslist;

    }

}