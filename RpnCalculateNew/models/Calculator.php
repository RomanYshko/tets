<?php

class Calculator
{
    //разделитель элементов в строке
    public $separator = " ";
    //математические операции. Для добавления операции добавить запись в этот массив и функцию strToArray.
    public $operations = ['+',	'-', '*', '/', '^'];

    public function strToArray($str)
    {
        //удаляем лишние пробелы
        $str = trim($str);
        //$str = preg_replace('# {2,}#',' ',$str); //Выполняет поиск и замену по регулярному выражению
        $array = explode($this->separator, $str); //Разбивает строку с помощью разделителя
        return $array;
    }
    public function calculate($a, $b, $c){
        if($c=='+')
            $result = $a + $b;
        elseif($c=='-')
            $result = $a - $b;
        elseif($c=='*')
            $result = $a * $b;
        elseif($c=='/')
        {
            if($b==0)
                throw new Exception("Дилить на ноль");
            $result = $a / $b;
        }
        else $result = pow($a, $b);

        return $result;

    }
    public function calculating($str){
        $array = $this->strToArray($str);
        $stack = [];
        foreach ($array as $token) {
            if (in_array($token, $this->operations)) { //Проверяет, присутствует ли в массиве значение
                if (count($stack) < 2) {
                    throw new Exception("Недостаточно данных для операции '$token'");
                }
                $b = array_pop($stack); //Извлекает последний элемент массива
                $a = array_pop($stack);
                $result = $this->calculate($a, $b, $token);
                array_push($stack, $result);
            }
            elseif (is_numeric($token)) { //Проверяет, является ли переменная числом или строкой, содержащей число
                array_push($stack, $token); //Добавляет один или несколько элементов в конец массива
            }
            else {
                throw new Exception("Недопустимый символ: \"$token\"");
            }
        }
        if (count($stack) > 1) {
            throw new Exception("Количество операторов не соответствует количеству операндов");
        }
        return array_pop($stack);
    }

}