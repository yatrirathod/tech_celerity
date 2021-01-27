<?php
	
	if(!function_exists('weekdays')){
		function weekdays(){

			return [
				   'Mon' => 'Monday',
			      'Tus' => 'Tuesday',
			      'Wed' => 'Wednesday',
			      'Thu' => 'Thursday',
			      'Fri' => 'Friday',
			      'Sat' => 'Saturday',
			      'Sun' => 'Sunday'
			];
		}
	}

	function upperCase($str){
		$strtoUpper = strtoupper($str);
		return $strtoUpper;
	}

	function lowerCase($stri){

		$strlower = strtolower($stri);

		return $strlower;
	}

	
?>