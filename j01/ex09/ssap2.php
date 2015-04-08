#!/usr/bin/php
<?php

function is_alpha($c) {return (('a' <= $c && $c <= 'z') || ('A' <= $c && $c <= 'Z'));}

function is_digit($c) {return ('0' <= $c && $c <= '9');}

function ssap2_sorting($s1, $s2) {
	if (is_alpha($s1[0]) && !is_alpha($s2[0]))
		return (-1);
	if (is_alpha($s2[0]) && !is_alpha($s1[0]))
		return (1);
	if (is_digit($s1[0]) && !is_digit($s2[0]))
		return (-1);
	if (is_digit($s2[0]) && !is_digit($s1[0]))
		return (1);
	return (strcoll(strtolower($s1), strtolower($s2)));
}
$array = [];
$i = 0;
foreach($argv as $value)
	if ($i)
	{
		$v = explode(" ", $value);
		$array = array_merge($array, $v);
	}
	else
		$i++;
usort($array, 'ssap2_sorting');
foreach($array as $v)
	fwrite(STDOUT, $v."\n");
?>
