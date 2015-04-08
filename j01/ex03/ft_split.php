<?php

function filter_function($var) {
	return ($var !== NULL && $var !== FALSE && $var !== '');}

function ft_split($str) {
	$var = array_filter(explode(" ", $str), 'filter_function');
	sort($var, SORT_REGULAR);
	return $var;}

?>
