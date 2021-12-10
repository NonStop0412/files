<?php
ini_set('memory_limit', '50MB');

$pattern = "часов";

// file_get_contents('имя файла');  -- чтение файла
// file_put_contents('имя файла', 'дата на запись', FILE_APPEND);  -- запись в файл

// сразу весь файл загрузить в пямять (в перменную $content)
$content = file_get_contents('имя файла');

// построчное чтение
$file = fopen("test.sql", "r");
while (($line = fgets($file)) !== false) {
	// $line contains $pattern
	if (strpos($line, $pattern) !== false) {
		file_put_contents('result.dat', $line);
		sleep(1);
	}
}

// построчное чтение в отдельной функции
function getFileContent($filename)
{
	$file = fopen($filename, "r");
	while (($line = fgets($file)) !== false) {
		// $line contains $pattern
		yield $line;
	}

	return "";
}

foreach (getFileContent('test.dat') as $line) {
	echo $line;
}
