<?php

include_once ROOT . '/models/Categories.php';
include_once ROOT . '/models/Product.php';
include_once ROOT . '/components/Pagination.php';

class CatalogController
{

    public static function actionIndex()
    {
        $categories = array();
        $categories = Categories::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(12);

        require_once(ROOT . '/views/catalog/index.php');
        return true;
    }

    public static function actionCategory($categoryId, $page = 1)
    {

        $categories = array();
        $categories = Categories::getCategoriesList();

        $categoryProducts = array();
        $categoryProducts = Product::getProductListByCategory($categoryId, $page);

        $total = Product::getTotalCountOfProductsInCategory($categoryId);
//        print_r($total['count']);die;

        $pagination = new Pagination($total['count'], $page, Product::SHOW_BY_DEFAULT, 'page-');

        require_once ROOT . '/views/catalog/category.php';

        return true;
    }

}