<?php

include_once ROOT.'/models/Categories.php';
include_once ROOT.'/models/Product.php';

class SiteController
{

    public function actionIndex(){

        $categories = array();
        $categories = Categories::getCategoriesList();

        $latestProducts = array();
        $latestProducts = Product::getLatestProducts(6);

        require_once (ROOT.'/views/site/index.php');
        return true;

    }

}