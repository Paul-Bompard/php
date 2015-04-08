#!/usr/bin/php
<?PHP

$fd = @fopen("php://stdin", "r");
while (feof($fd) == FALSE) 
{
	fwrite(STDOUT, "Entrez un nombre: ");
	$buffer = trim(fgets($fd));
	if (feof($fd))
	{
		fwrite(STDOUT, "^D\n");
	}
	else if (is_numeric($buffer))
	{
		if (($buffer % 2) === 0) 
			fwrite(STDOUT, "Le chiffre $buffer est Pair\n");
		else
			fwrite(STDOUT, "Le chiffre $buffer est Impair\n");
	}
	else
		fwrite(STDOUT, "'$buffer' n'est pas un chiffre\n");
}

?>
