<?php

class LfmArrayUtil
{
	/*
	* extract $offset elements from top of $array
	* and push them at the bottom
	*/
  public static function rotate($array, $offset)
  {
    if($offset == 0) return $array;

    $l = count($array);
    $offset = LfmMathUtil::modulus($offset, $l);

    if($offset == $l) return $array;

    $tmp = array_slice($array, $offset);
    for($i = 0; $i < $offset; $i++)
    {
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
