<?PHP
function ft_is_sort($tab)
{
	$i = 0;
	foreach ($tab as $value)
	{
		if ($i != 0 && $save > $value)
			return (FALSE);
		$save = $value;
		$i++;
	}
	return (TRUE);
}
?>
