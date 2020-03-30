<?php
$html = file_get_contents('main.html');

include 'galery.php';

$time =  date('d.m.y H:i:s');


file_put_contents('log.txt', $time . PHP_EOL, FILE_APPEND);

echo str_replace(['{img1}','{img2}','{img3}'],$galery,$html);
    