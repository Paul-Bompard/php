#!/usr/bin/php
<?php
if ($argc == 4)
{
	if (strchr($argv[2], "+"))
		$v = $argv[1] + $argv[3];
	else if (strchr($argv[2], "-"))
		$v = $argv[1] - $argv[3];
	else if (strchr($argv[2], "*"))
		$v = $argv[1] * $argv[3];
	else if (strchr($argv[2], "/"))
		$v = $argv[1] / $argv[3];
	else if (strchr($argv[2], "%"))
		$v = $argv[1] % $argv[3];
	fwrite(STDOUT, $v."\n");
}
else
	fwrite(STDOUT, "Incorrect Parameters\n");
?>
