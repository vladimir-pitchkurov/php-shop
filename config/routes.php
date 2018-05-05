<?php

return array(

    'product/([0-9]+)' => 'product/view/$1',  /*  actionView в ProductController  */

    'catalog'=>'catalog/index',  /*  CatalogController->actionIndex()  */

    'category/([0-9]+)'=>'catalog/category/$1',  /*  CatalogController->actionIndex()  */

    '' => 'site/index',  /*  SiteController->actionIndex  */

);