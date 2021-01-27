<?php 

class Helpers{

	public static function sample_helper(){

		return "new_sample_function";
	}
	
	function upperCase($str){
		$strtoUpper = strtoupper($str);
		return $strtoUpper;
	}

}