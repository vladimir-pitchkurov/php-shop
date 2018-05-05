<?php

include_once ROOT.'/models/Categories.php';
include_once ROOT.'/models/Product.php';

class ProductController
{

    public function actionList()
    {
        echo 'ProductController -> actionList';
        return true;
    }

    public function actionView($productId)
    {
        $categories = array();
        $categories = Categories::getCategoriesList();

        $product = Product::getProductById($productId);

        require_once (ROOT.'/views/product/view.php');

        return true;

    }

}