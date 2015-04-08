#!/usr/bin/php
<?php

function filter_function($var){
	return ($var !== NULL && $var !== FALSE && $var !== '');
}

if ($argc != 2)
	fwrite(STDOUT, "Incorrect Parameters\n");

else
{
	$str = str_replace("+", " + ", $argv[1]);
	$str = str_replace("-", " - ", $str);
	$str = str_replace("*", " * ", $str);
	$str = str_replace("%", " % ", $str);
	$str = str_replace("/", " / ", $str);
	$str = array_values(array_filter(explode(" ", $str), 'filter_function'));
	if ((!is_numeric($str[0]) && !strcoll($str[0], "0")) ||
		(!is_numeric($str[2]) && !strcoll($str[2], "0")) ||
		!(strcoll($str[1], "+") || strcoll($str[1], "-") ||
		strcoll($str[1], "*") || strcoll($str[1], "/") ||
		strcoll($str[1], "%")) || sizeof($str) != 3 ||
		((!strcoll($str[1], "%") || !strcoll($str[1], "/")) &&
		!strcoll($str[2], "0")))
		fwrite(STDOUT, "Syntax Error\n");
	else {
		if (strchr($str[1], "+"))
			$v = $str[0] + $str[2];
		else if (strchr($str[1], "-"))
			$v = $str[0] - $str[2];
		else if (strchr($str[1], "*"))
			$v = $str[0] * $str[2];
		else if (strchr($str[1], "/"))
			$v = $str[0] / $str[2];
		else if (strchr($str[1], "%"))
			$v = $str[0] % $str[2];
		fwrite(STDOUT, $v."\n");
	}
}
?>
