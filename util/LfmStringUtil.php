<?php

class LfmStringUtil
{

	public static function contains($needle, $haystack, $ignoreCase=false)
	{
		$func = $ignoreCase ? 'stripos' : 'strpos';
		$pos = $func($haystack, $needle);
		return $pos === false ? false : $pos + 1 ;
	}

}