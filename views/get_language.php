<?php
function get_language(){
  preg_match_all('/([a-z]{1,8}(?:-[a-z]{1,8})?)(?:;q=([0-9.]+))?/', strtolower($_SERVER["HTTP_ACCEPT_LANGUAGE"]), $matches); // Получаем массив $matches с соответствиями
  $langs = array_combine($matches[1], $matches[2]); // Создаём массив с ключами $matches[1] и значениями $matches[2]
  foreach ($langs as $n => $v)
    $langs[$n] = $v ? $v : 1; // Если нет q, то ставим значение 1
  arsort($langs); // Сортируем по убыванию q
  $default_lang = key($langs); // Берём 1-й ключ первого (текущего) элемента (он же максимальный по q)
  // echo $default_lang; // Выводим язык по умолчанию

// Ищем соответствия языку  
if(preg_match('/en/',$default_lang)) return "en";
else  return "ru";

  }
// Получаем язык по умолчанию
$language = get_language();

// Подключаем языковой класс, который парсит ini файлы
require_once(ROOT.'/components/Language.php');

// Если мы вручную выбирали язык, то будет установлен выбранный
if(isset($_SESSION['lang']))$language=$_SESSION['lang'];

$lang = new Language($language);
?>