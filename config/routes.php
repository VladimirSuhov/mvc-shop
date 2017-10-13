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

    'catalog' => 'catalog/index',
    'category/([0-9]+)' => 'catalog/category/$1',
    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',
    'catalog/([0-9]+)' => 'catalog/catalog/$1',
    'product/([0-9]+)' => 'product/view/$1',

    'account' => 'account/index',
    'account/edit' => 'account/edit',

    'user/register' => 'user/register',
    'user/login' => 'user/login',
    'user/logout' => 'user/logout',
    'contacts' => 'site/contact',
    'cart' => 'cart/index',
    'cart/add/([0-9]+)' => 'cart/add/$1',
    'cart/addAjax/([0-9]+)' => 'cart/addAjax/$1',

    '' => 'site/index'
);