<?php
// Если мы вручную выбирали язык, то будет установлен выбранный
class LangController {
	
	public function actionRun($var){
		if($var==0){
			// echo "0";
			$_SESSION['lang']="ru";
			
		}
		elseif($var==1){
			// echo "1";
			$_SESSION['lang']="en";
		}

		header("Location: /");
		return true;
	}

}