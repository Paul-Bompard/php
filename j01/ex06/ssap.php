#!/usr/bin/php
<?php
function filter_function($var) {
		return ($var !== NULL && $var !== FALSE && $var !== '');}
$array = [];
$i = 0;
foreach($argv as $value)
	if ($i)
	{
		$v = explode(" ", $value);
		$v = array_filter($v, 'filter_function');
		$array = array_merge($array, $v);
	}
	else
		$i++;
sort($array, SORT_REGULAR);
foreach($array as $v)
	fwrite(STDOUT, $v."\n");
?>
