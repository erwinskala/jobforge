<?php
require_once(ROOT.'/model/User.php');
class UserController {

        // Метод регистрации пользователя
    public function actionRegister(){
        // Инициализируем переменный регистрации
        $result=false;
        $name='';$email='';$password='';

        // Если была нажата кнопка отправления
        if(isset($_POST['submit'])){
        // Получаем переменные методом POST
            $name=$_POST['name'];
            $email=$_POST['email'];
            $password=$_POST['password'];
            
            $errors=false;
            // Проверяем, правильно ли заполнено имя
            if(User::checkName($name)){
                //echo $name;
            }
            else 
            // Если метод выдал ложь, значит у нас ошибка. Записываем ошибку в массив
                $errors[] = "Имя должно содержать больше 3х символов";
            // Проверяем, правильно ли заполнен пароль
            if(User::checkPassword($password)){
               //echo $password; 
            }
            else 
                $errors[] = "Пароль должен содержать больше 5и символов";
            // Проверяем, правильно ли заполнен почтовый ящик
            if(User::checkMail($email)){
                //echo $email;
            }
            else 
                $errors[] = "Неправельный email";
            // Проверяем, есть ли у нас в базе такой email
            if(!User::checkMailExists($email)){
                //echo $email;
            }
            else 
                $errors[] = "Email {$email} занят пользователем";
            
            if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                $type=$_FILES['image']['type']; 

                // Проверяем, соответствует ли загруженный файл требуемому типу
                if($type != "image/gif" and $type != "image/png" and $type != "image/jpeg")
                $errors[] = "Неверный тип загружаемого файла";
                        // Если загружалось, переместим его в нужную папке, дадим новое имя

            if($type=="image/gif")$ras=".gif";
            elseif($type=="image/png")$ras=".png";
            else $ras=".jpg";

            }
            if($errors==false){
            // Если всё хорошо, регистрируем пользователя
                $result=User::register($name,$email,$password,$ras);
            // Если есть картинка на сервере, берём её из временной папки и ложим в папку uploads
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] ."/upload/".$result.$ras);
                }


            }
            
        }
        
        include_once(ROOT."/views/register.php");
        return true;
    }
    // Метод аутентификации пользователя
    public function actionLogin(){
        // Инициализируем переменный аутентификации
        $email='';
        $password='';
        // Если была нажата кнопка отправления        
        if(isset($_POST['submit'])){
            
            $email=$_POST['email'];
            $password=$_POST['password'];
            
            $errors=false;
            // Проверяем, правильно ли заполнен пароль            
            if(User::checkPassword($password)){
               //echo $password; 
            }
            else 
            // Если метод выдал ложь, значит у нас ошибка. Записываем ошибку в массив
                $errors[] = "Пароль должен содержать больше 5и символов";
            // Проверяем, правильно ли заполнен почтовый ящик            
            if(User::checkMail($email)){
                //echo $email;
            }
            else 
                $errors[] = "Неправельный email";
            // Берём из базы мэйл и пароль и если они соответствуют введёным, значит всё хорошо
            $userId=User::checkUserData($email,$password);
            
            if($userId==false)$errors[] ="Неправельные данные для входа на сайт";
            else{
                //echo $userId;
                User::auth($userId);
                header("Location:/cabinet/");
            }
        }    
        
        
        
        include_once(ROOT."/views/login.php");
        return true;
    }

}

