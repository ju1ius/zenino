<?php

class LfmRegexUtil
{

	public static function splitCamelCase($str)
	{
		return preg_split( '/(?<![A-Z])(?=[A-Z])/', $str );
	}

}