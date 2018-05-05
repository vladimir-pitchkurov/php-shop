<?php

return array(

    'product/([0-9]+)'                => 'product/view/$1',  /*  actionView в ProductController  */

    'catalog'                         => 'catalog/index',  /*  CatalogController->actionIndex()  */

    'category/([0-9]+)/page-([0-9]+)' => 'catalog/category/$1/$2',  /*  CatalogController->actionIndex()  */

    'category/([0-9]+)'               => 'catalog/category/$1',  /*  CatalogController->actionIndex()  */

    'user/register'                   => 'user/register',

    ''                                => 'site/index',  /*  SiteController->actionIndex  */

);