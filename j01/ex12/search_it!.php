#!/usr/bin/php
<?php
function filter_function($var){
	return ($var !== NULL && $var !== FALSE && $var !== '');
}

$i = 0;
$array = [];
foreach($argv as $value) {
	if ($i > 1)
	{
		$a = array_values(array_filter(explode(":", $value), 'filter_function'));
		if (sizeof($a) != 2)
			return ;
		$arr[$a[0]] = $a[1];
	}
	else
		$i++;
}
if ($arr[$argv[1]])
	fwrite(STDOUT, $arr[$argv[1]]."\n");
?>
