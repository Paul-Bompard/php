#!/usr/bin/php
<?PHP

$i = 1;
while ($i < $argc)
{
	fwrite(STDOUT, "$argv[$i]\n");
	$i++;
}

?>
