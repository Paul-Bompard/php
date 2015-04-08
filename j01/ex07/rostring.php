#!/usr/bin/php
<?PHP

function filter_function($var) {
		return ($var !== NULL && $var !== FALSE && $var !== '');}

function ft_splitwithoutsort($str)
{
	$tab = explode(" ", $str);
	$tab = array_filter($tab, 'filter_function');
	return($tab);
}

$str = ft_splitwithoutsort($argv[1]);
$i = 0;
foreach ($str as $str)
{
	if ($i != 0)
		fwrite(STDOUT, "$str ");
	else
		$first = $str;
	$i++;
}
if ($argc > 1)
	fwrite(STDOUT, "$first\n");

?>
