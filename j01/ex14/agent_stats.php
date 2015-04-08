#!/usr/bin/php
<?php
	function filter_function($var) {
		return ($var !== NULL && $var !== FALSE && $var !== '');
	}
	function single_pos($str, $array) {
		$pos = -1;
		$i = 0;
		foreach ($array as $s) {
			if (!strcoll($str, $s)) {
				if ($pos == -1)
					$pos = $i;
				else
					return (-1);
			}
			$i++;
		}
		return ($pos);
	}
	function average($lst) {
		$nb = sizeof($lst);
		$total = array_sum($lst);
		return ($total / $nb);
	}
	// function single_pos($str, $array)
	if (!strcoll("moyenne", $argv[1]))
		$kind = 0;
	else if (!strcoll("moyenne_user", $argv[1]))
		$kind = 1;
	else if (!strcoll("ecart_moulinette", $argv[1]))
		$kind = 2;
	else
		fwrite(STDOUT, "Argument is invalid\n");
	$str = "";
	while ($nb = fgets(STDIN))
		$str .= $nb;
	$notes = array_values(array_filter(explode("\n", $str), 'filter_function'));
	$first_line = array_values(array_filter(explode(";", $notes[0]), 'filter_function'));
// print_r($first_line);
	$user_pos = single_pos("User", $first_line);
	$note_pos = single_pos("Note", $first_line);
	$rater_pos = single_pos("Noteur", $first_line);
	if (sizeof($first_line) == 3 || $user_pos == -1 || $note_pos == -1) {
		fwrite(STDOUT, "File is invalid\n");
		return ;
	}
	$moyenne = [];
	$moyenne_user = [];
// fwrite(STDOUT, "user_pos == '".$user_pos."' && note_pos == '".$note_pos."'\n");
	foreach ($notes as $note) {
		if ($notes[0] != $note) {
			$elems = array_values(explode(";", $note));
			if (sizeof($elems) == 4 && filter_function($elems[$user_pos]) &&
				filter_function($elems[$note_pos]))
			{
				if (strcoll("moulinette", $elems[$rater_pos])) {
					array_push($moyenne, $elems[$note_pos]);
				}
				if (!$moyenne_user[$elems[$user_pos]])
					$moyenne_user[$elems[$user_pos]] = [[], []];
				if (strcoll("moulinette", $elems[$rater_pos]))
					array_push($moyenne_user[$elems[$user_pos]][0], $elems[$note_pos]);
				else
					array_push($moyenne_user[$elems[$user_pos]][1], $elems[$note_pos]);
			}
		}
	}
	$moyenne = average($moyenne);
	foreach ($moyenne_user as $key => $value) {
		$moyenne_user[$key][0] = average($moyenne_user[$key][0]);
		$moyenne_user[$key][1] = average($moyenne_user[$key][1]);
	}
	ksort($moyenne_user);
	if ($kind == 0)
		fwrite(STDOUT, $moyenne."\n");
	if ($kind == 1) {
		foreach ($moyenne_user as $key => $value) {
			fwrite(STDOUT, $key.":".$value[0]."\n");}
	}
	if ($kind == 2) {
		foreach ($moyenne_user as $key => $value) {
			$v = $value[0] - $value[1];
			fwrite(STDOUT, $key.":".$v."\n");}
	}
?>