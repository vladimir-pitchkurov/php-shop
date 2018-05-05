<?php

include_once ROOT.'/models/Categories.php';
include_once ROOT.'/models/Product.php';

class CatalogController
{

    public static function actionIndex(){
        $categories = array();
        $categories = Categories::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(12);

        require_once (ROOT.'/views/catalog/index.php');
        return true;
    }

    public static function actionCategory($categoryId){
        $categories = array();
        $categories = Categories::getCategoriesList();

        $categoryProducts = array();
        $categoryProducts = Product::getProductListByCategory($categoryId);

        require_once ROOT.'/views/catalog/category.php';
    }

}