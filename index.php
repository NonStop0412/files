<?php
ini_set('memory_limit', '50MB');




// file_get_contents('имя файла');  -- чтение файла
// file_put_contents('имя файла', 'дата на запись', FILE_APPEND);  -- запись в файл

// сразу весь файл загрузить в пямять (в перменную $content)
//$content = file_get_contents('log');

// построчное чтение
function getFileContent($filename)
{
    $jpgPattern = ".jpg" ;
    $gifPattern = ".gif";
    $pngPattern = ".png";
    $file = fopen($filename, "r");
    file_put_contents('jpg_images.dat', "JPG Files:\n");
    file_put_contents('gif_images.dat', "GIF Files:\n");
    file_put_contents('png_images.dat', "PNG Files:\n");
    while (($line = fgets($file)) !== false) {
        // $line contains $pattern
        if (strpos(strtolower($line), $jpgPattern) !== false) {
            file_put_contents('jpg_images.dat', $line, FILE_APPEND);
        } elseif (strpos(strtolower($line), $gifPattern) !== false) {
            file_put_contents('gif_images.dat', $line, FILE_APPEND);
        } elseif (strpos(strtolower($line), $pngPattern) !== false) {
            file_put_contents('png_images.dat', $line, FILE_APPEND);
        }
    }
}

getFileContent('log');
var_dump('Done');

// построчное чтение в отдельной функции
//function getFileContent($filename)
//{
//	$file = fopen($filename, "r");
//	while (($line = fgets($file)) !== false) {
//		// $line contains $pattern
//		yield $line;
//	}
//
//	return "";
//}
//
//foreach (getFileContent('test.dat') as $line) {
//	echo $line;
//}