<?php
require_once(ROOT.'/model/User.php');
class CabinetController{
// Класс для зарегистрированных или аутентифицированных пользователей    
    function actionIndex(){
// Проверяем аутентифицирован ли пользователь        
        $userId=User::checkLogged();
        //echo $userId;
// Получаем по id всю информацию пользователя        
        $user=User::getUserById($userId);
        
        
        include_once(ROOT."/views/cabinet.php");
        return true;
    }

    function actionLogout(){
// Выход из кабинета
        unset($_SESSION['user']);

        header("Location: /");
        return true;
    }
    
    
}

