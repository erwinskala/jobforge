<?php
class User{
    static public function checkName($name){
        // Если символов больше двух
        if(strlen($name)>=3)return true;
            else return false;
    }
    static function checkPassword($password){
        // Если символов больше шести
        if(strlen($password)>=6)return true;
        return false;
    }
    static function checkMail($email){
        // Проверяем валидность емэйла
        if(filter_var($email,FILTER_VALIDATE_EMAIL)) return true;
        return false;
    }

    static function checkMailExists($email){
        // Проверяем, есть ли уже в базе такой емайл
        $db=Db::getConnection();
        
        $sql="SELECT COUNT(*) FROM user WHERE email=:email";
        $result=$db->prepare($sql);
        // Это у нас подготовленный запрос, для защиты от sql инекций
        $result->bindParam(':email',$email,PDO::PARAM_STR);
        $result->execute();
        
        if($result->fetchColumn())return true;
        return false;
    }
    static function checkUserData($email, $password){
        $db=Db::getConnection();
        // Выбираем из базы нужный емэйл и пароль
        $sql="SELECT id FROM user WHERE email=:email AND password=:password";
        $result=$db->prepare($sql);
        // Это у нас подготовленный запрос, для защиты от sql инекций
        $result->bindParam(':email',$email,PDO::PARAM_INT);
        $result->bindParam(':password',$password,PDO::PARAM_INT);
        $result->execute();
        
        $user=$result->fetch();

        // Возвращаем id пользователя
        if($user)return $user['id'];
        
        return false;
    }
    static function register($name,$email,$password,$avatar){
        $db=Db::getConnection();
        // Регистрируем пользователя
        $sql="INSERT INTO user (name,email,password,avatar) VALUES(:name,:email,:password,:avatar)";
        $result=$db->prepare($sql);
        // Это у нас подготовленный запрос, для защиты от sql инекций
        $result->bindParam(':name',$name,PDO::PARAM_STR);
        $result->bindParam(':email',$email,PDO::PARAM_STR);
        $result->bindParam(':password',$password,PDO::PARAM_STR);
        $result->bindParam(':avatar',$avatar,PDO::PARAM_STR);

        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }

        return $result->execute();
        
    }
    static function auth($userId){
        // Аутентификация пользователя, записываем в сессию его id
        return $_SESSION['user']=$userId;
    }
    
    static function checkLogged(){
        // Проверяем аутентифицирован ли пользователь
        if(isset($_SESSION['user'])) return $_SESSION['user'];
        else header("Location:user/login");
    }

    static function getUserById($id){
        // Получаем по id всю информацию пользователя
    $id=intval($id);

    if($id){
    $db=Db::getConnection();

    $result=$db->query("SELECT * FROM user WHERE id=".$id);
    $result->setFetchMode(PDO::FETCH_ASSOC);
    
    
   return  $result->fetch();
        }
    }
    
    static function isGuest(){
        // Проверяем аутентифицирован ли пользователь
        if(isset($_SESSION['user']))return false;
        else return true;
    }

}

