<?php
/**
 * Created by PhpStorm.
 * User: Vova
 * Date: 25.09.2017
 * Time: 16:37
 */

return array(
    'news/([0-9]+)' => 'news/view/$1',
    'news' => 'news/index',
//    'product' => 'product/index',
    'product/([0-9]+)' => 'product/view/$1',
    'catalog/([0-9]+)' => 'catalog/catalog/$1',
    '' => 'site/index'
//    'products' => 'product/index'
);