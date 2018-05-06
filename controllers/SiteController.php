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

    /**
     * Action для страницы "Контакты"
     */
    public function actionContact()
    {
        // Переменные для формы
        $userEmail = false;
        $userText = false;
        $result = false;
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $userEmail = $_POST['userEmail'];
            $userText = $_POST['userText'];
            // Флаг ошибок
            $errors = false;
            // Валидация полей
            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Неправильный email';
            }
            if ($errors == false) {
                // Если ошибок нет
                // Отправляем письмо администратору
                $adminEmail = 'vladimirpitbul@gmail.com';
                $message = "Текст: {$userText}. От {$userEmail}";
                $subject = 'Тема письма';
                $result = mail($adminEmail, $subject, $message);
                $result = true;
            }
        }
        // Подключаем вид
        require_once(ROOT . '/views/site/contact.php');
        return true;
    }

}