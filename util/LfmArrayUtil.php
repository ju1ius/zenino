<?php

class LfmArrayUtil
{
	/*
	* extract $offset elements from top of $array
	* and push them at the bottom
	*/
	public static function rotate($array, $offset){
		$tmp = array_slice($array, $offset);
		for($i = 0; $i < $offset; $i++){
			$tmp[] = $array[$i];
		}
		return $tmp;
	}
	
	public static function dump($array){
		echo '<pre>';
		print_r($array);
		echo '</pre>';
	}

}