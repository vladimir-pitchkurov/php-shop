<?php
/**
 * Created by IntelliJ IDEA.
 * User: Админ
 * Date: 05.05.2018
 * Time: 13:26
 */

class Product
{
    const SHOW_BY_DEFAULT = 10;

    public static function getLatestProducts($count = self::SHOW_BY_DEFAULT)
    {
        $count = intval($count);
        $db = Db::getConnection();
        $productList = array();
        $result = $db->query("SELECT id, name, description, price, is_new FROM product WHERE status = '1' ORDER BY id DESC LIMIT " . $count);
        $i = 0;
        while ($row = $result->fetch()) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['description'] = $row['description'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        return $productList;
    }

    public static function getProductListByCategory($categoryId = false)
    {
        $categoryId = intval($categoryId);
        $db = Db::getConnection();
        $productList = array();
        $result = $db->query("SELECT id, name, description, price, is_new FROM product "
            . "WHERE status = '1' AND category_id = $categoryId ORDER BY id DESC LIMIT " . self::SHOW_BY_DEFAULT);
        $i = 0;
        while ($row = $result->fetch()) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['description'] = $row['description'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        return $productList;
    }

    public static function getProductById($productId){

        $productId = intval($productId);
        if ($productId){
            $db = Db::getConnection();

            $result = $db->query('SELECT * FROM product WHERE id = '.$productId);
            $result->setFetchMode(PDO::FETCH_ASSOC);

            return $result->fetch();
        }

    }

}