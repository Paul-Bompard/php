<?php
function ft_is_inc($array) {
	$tmp = NULL;
	foreach($array as $v) {
		if ($tmp && $tmp > $v)
			return FALSE;
		$tmp = $v;
	}
	return TRUE;
}
function ft_is_dec($array) {
	$tmp = NULL;
	foreach($array as $v) {
		if ($tmp && $tmp < $v)
			return FALSE;
		$tmp = $v;
	}
	return TRUE;
}
function ft_is_sort($array) {
	return (ft_is_inc($array) || ft_is_dec($array));
}
?>
