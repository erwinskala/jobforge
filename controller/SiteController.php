<?php
class SiteController{
    public function actionIndex(){
      

      // echo "SiteController-actionIndex";

      include_once(ROOT.'/views/home.php');
        return true;
    }
    
    public function actionContact(){
        

        
        include_once(ROOT."/views/site/contact.php");
        return true;
    }
}

