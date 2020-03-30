<?php
function galery_render($galery_dir){
	$array = scandir(__DIR__ . '\\'.$galery_dir);
	$galery =[];
	for ($i = 2; $i < count($array); $i++){
		$galery[] = $galery_dir . '\\' . $array[$i];
	}
	return $galery;
}

$galery = galery_render('img');

