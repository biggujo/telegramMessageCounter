<?php
preg_match_all('|<div class=\"from_name\">(.+)</div>|isU', file_get_contents('united.html'), $array);

$array = implode("|", $array[0]);
$array = strip_tags($array, '<div class=\"from_name\"><div></div>');
$array = preg_replace('/[ ]\d{2}[.]\d{2}[.]\d{4}[ ]\d{2}[:]\d{2}[:]\d{2}/', '', $array);
$array = preg_replace('|via|', '', $array);
$array = preg_replace('/@[a-zA-Zа-яА-Я]/', '', $array);
$array = preg_replace('|class="from_name">|', '', $array);
$array = preg_replace('/[* ][via][ *]/', '', $array);
 
$stat = [];
 
foreach(explode(' ', $array) as $v)
    if(isset($stat[$v]))
        $stat[$v]++;
    else
        $stat[$v] = 1;
 
arsort($stat); // Сортировка по убыванию

$file = fopen('result.html' , 'w');
fclose($file);
$file = fopen('result.html' , 'a');

$head = '<!DOCTYPE html>
<html>
	<head>
		<title>Statistics</title>
		<link rel="shortcut icon" type="image/x-icon" href="/fav/fav.ico">
		<link rel="stylesheet" type="text/css" href="/res/css/main.css"/>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	</head>
<body>
<h1>Statistics</h1>

<div class="table_style" style="margin:0 auto;">
<table>
	<th>Word</th>
	<th>Mentions</th>';

fwrite($file, $head);

foreach(array_slice($stat, 3)  as $k => $v) {
    $b = '
	<tr>
		<td>'.$k.'</td><td>'.$v.'</td>
	</tr>';
	fwrite($file, $b);
}


$c = '</table>
Count: '.count($stat).'

</body>
</html>';

fwrite($file, $c);
fclose($file);

echo 'OK!</br>';
echo '<a href="result.html">Open results</a>';
?>