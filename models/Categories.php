<?php
/**
 * Created by IntelliJ IDEA.
 * User: Админ
 * Date: 05.05.2018
 * Time: 12:35
 */

class Categories
{

    public static function getCategoriesList(){

        $db = Db::getConnection();

        $categoryList = array();

        $result = $db->query("SELECT id, name FROM category ORDER BY sort_order ASC ");

        $i =0;

        while ($row = $result->fetch()){
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $i++;
        }

        return $categoryList;
    }
}