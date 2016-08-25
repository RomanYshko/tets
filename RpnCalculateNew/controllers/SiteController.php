<?php

class SiteController
{
    public function actionIndex()
    {
        $string = $_POST["string"];
        if ($string!= "") {
            $rpn = new Calculator();
            try {
                $result = $rpn->calculating($string);
            } catch (Exception $e) {
                $error = 'Ошибка: ' . $e->getMessage();
            }
        }
        // Подключаем вид
        require_once(ROOT . '/views/site/index.php');
        return true;
    }
}
