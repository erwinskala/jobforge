<?php

class Router {
    
    private $routes;

 
    public function __construct(){
// Это файл путей, где ключ массива, это то что вводится в строке браузера, а значение здесь это класс, который обрабатывает запрос, потом идёт метод который будет работать в этом классе
     $routesPath=ROOT."/config/routes.php"; 
     $this->routes=include($routesPath);
    }
    
// Получаем текущий запрос из браузера
    private function getUri(){
        if(!empty($_SERVER["REQUEST_URI"])){
            return trim($_SERVER["REQUEST_URI"],"/");
        }
    }
    
    public function run(){
        $uri=$this->getUri();

// Пропускаем через цикл наш текущий запрос        
        foreach($this->routes as $uriPattern => $path){

// Ищем соответствие нашему запросу в уже прописанных запросах            
            if(preg_match("~$uriPattern~",$uri)){
// Находим класс и метод соответствующий нашему паттерну                
                $internalRoute =preg_replace("~$uriPattern~",$path,$uri);
// Разбивает нашу строку на массив, слэш здесь как разделитель                
                $segments=explode("/",$internalRoute);
// Вырезаем первый элемент массива, у нас это имя класса и добавляем к нему слово Controller
                $controllerName=array_shift($segments)."Controller";
// Меняем первую букву на заглавную                
                $controllerName=ucfirst($controllerName);
// Вырезаем следующее слово, это наш метод и добовляем к нему слово action            
                $actionName="action".ucfirst(array_shift($segments));
                
                $parameters=$segments;
                //print_r($parameters);
                
                //echo "Класс ".$controllerName."<br />";
                //echo "Метод ".$actionName."<br />";
// Формируем путь к требуему класс
                $controllerFile=ROOT."/controller/".$controllerName.".php";
                //echo $controllerFile;
// Подключаем файл с классом, который нам нужен, если он существует
                if(file_exists($controllerFile)){
                    // echo "Файл найден";
                    include_once($controllerFile);
                }else{
                    echo "Файл не найден";
                }
// Создаём объект нужного нам класса
                $controllerObject=new $controllerName;
                // $result=$controllerObject->$actionName($parameters);

// Вызываем нужный нам метод с параметрами                
                $result=@call_user_func_array(array($controllerObject,$actionName),$parameters);
                
                if($result!=null){
                    break;
                }
                
                
                
            }
        }
    }
}

