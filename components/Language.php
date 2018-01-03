<?php
class Language{
	
private $data;

	function __construct($language){
		$this->data = parse_ini_file("languages/system_$language.ini");

	}

	function get($label){
		return $this->data[$label];
	}

}