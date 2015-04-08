#!/usr/bin/php
<?PHP

function filter_function($var) {
	return ($var !== NULL && $var !== FALSE && $var !== '');}

if ($argc != 1)
{
	$tab = explode(" ", $argv[1]);
	$tab = array_filter($tab, 'filter_function');
	$tab = implode(" ", $tab);
	fwrite(STDOUT, "$tab\n");
}
?>
