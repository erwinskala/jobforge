<?php
function __autoload($class){
    
    $array_path=array("/components/","/models/");
    
    foreach($array_path as $path){
        $path=ROOT.$path.$class.".php";
        if(is_file($path))
            include_once($path);
    }
    
}

