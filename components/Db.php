<?php
// Класс подключения к базе данных
class Db
{
        public static function getConnection(){
// Этот файл получает массив необходимых данных, для доступа к базе данных

            $paramsPath=ROOT."/config/db_params.php";

            
// Этот файл получает массив необходимых данных, для доступа к базе данных

            $param = include($paramsPath);

            // print_r($param);




// Подключаемся к базе данных через класс PDO, создаём его объект подключения        


$db = new PDO("mysql:host={$param['host']}; dbname={$param['dbname']}", $param['user'], $param['password']);


// Выполняем подключение и задаём нашему подключению кодировку
            $db->exec("set names utf8");
            return $db;
    }
}


