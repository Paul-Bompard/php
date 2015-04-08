#!/usr/bin/php
<?php

if ($argc == 2 || $argc == 1)
{
	$filename1 = '/tmp/.ex13_question';
	$filename2 = '/tmp/.ex13_poisson';
	$filename3 = '/tmp/.ex13_reponse';
	$filename4 = '/tmp/.ex13_deja';
	if (strcoll($argv[1], "mais pourquoi cette demo ?") == 0)
		fwrite(STDOUT, "Tout simplement pour qu'en feuilletant le sujet\non ne s'apercoive pas de la nature de l'exo\n");
	if (strcoll($argv[1], "mais pourquoi cette chanson ?") == 0)
	{
		$fd = fopen( "/tmp/.ex13_question" , "w");
		fclose ($fd);
		fwrite(STDOUT, "Parce que Kwame a des enfants\n");
	}
	if (strcoll($argv[1], "vraiment ?") == 0)
	{
		if (file_exists($filename1))
		{
			$fd = fopen( "/tmp/.ex13_poisson" , "w");
			fclose ($fd);
			fwrite(STDOUT, "Nan c'est parce que c'est le premier avril\n");
			unlink($filename1);
		}
		else if (file_exists($filename2))
		{
			$fd = fopen( "/tmp/.ex13_reponse" , "w");
			fclose ($fd);
			fwrite(STDOUT, "Oui il a vraiment des enfants\n");
			unlink($filename2);
		}
		else if (file_exists($filename3))
		{
			$fd = fopen( "/tmp/.ex13_deja" , "w");
			fclose ($fd);
			fwrite(STDOUT, "J'ai déjà répondu à ta question bordel !\n");
			unlink($filename3);
		}
		else
			fwrite(STDOUT, "...\n");
	}
}
else
	fwrite(STDOUT, "Syntaxe Error\n");

?>
