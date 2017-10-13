<?php

class Product
{

    const SHOW_BY_DEFAULT = 2;

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

    public static function getProductsListByCategoryId($categoryId, $page, $count = self::SHOW_BY_DEFAULT) {

        if($categoryId) {

            $page = intval($page);

            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
            echo $offset;
            $db = DB::getConnection();

            $productslist = array();

            $result = $db->query("SELECT id, name, price, image, is_new FROM product "
                . "WHERE status = '1' AND category_id=" . $categoryId
                . " ORDER BY id ASC"
                . " LIMIT " . $count
                .  ' OFFSET ' . $offset);

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

    public static function getProductById($id) {

        $id = intval($id);

        if($id) {

            $db = DB::getConnection();

            $result = $db->query('SELECT * FROM product WHERE id=' . $id);

            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();

        }
    }

    public static function getProductsByIds($idsArray) {

        $products = array();
        if($idsArray) {

            $db = DB::getConnection();

            $idsString = implode(',', $idsArray);

            $sql = "SELECT * FROM product WHERE status='1' AND id IN ($idsString)";

            $result = $db->query($sql);

            $result->setFetchMode(PDO::FETCH_ASSOC);

            $row = $result->fetch();

            $i = 0;

            while ($row = $result->fetch()) {
                $products[$i]['id'] = $row['id'];
                $products[$i]['code'] = $row['code'];
                $products[$i]['name'] = $row['name'];
                $products[$i]['price'] = $row['price'];
                $products[$i]['image'] = $row['image'];
            }

            return $products;

        }
    }

    public static function getTotalProductsInCategory($categoryId) {

            $db = DB::getConnection();

            $result = $db->query('SELECT count(id) AS count FROM product '
            . 'WHERE status="1" AND category_id = "'.$categoryId.'"'
            );

            $result->setFetchMode(PDO::FETCH_ASSOC);

            $row = $result->fetch();

            return $row['count'];
        }
}