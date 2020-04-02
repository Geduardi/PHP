<?php
$html = file_get_contents('main.html');
$gallery_dir = 'img';
$item_html ='';
if (!empty($_GET['id'])){
    $link = mysqli_connect('localhost', 'root', '', 'GB');
    $sql = "SELECT `id`, `name`, `size`, `descr`, `views` FROM `img` WHERE `id` = {$_GET['id']}";
    $item = mysqli_fetch_assoc(mysqli_query($link, $sql));

    $item_html = "
    <div style='font-size: 20px; margin: 20px 0'>
            <p>Название: {$item['name']}</p>
            <p>Размер: {$item['size']} КБ</p>
            <p>Категория: {$item['descr']}</p>
            <p>Просмотров: {$item['views']}</p>
            <img src=\"$gallery_dir\\{$item['name']}\" style='margin: 50px 0'>
    </div>
        ";
    $sql = "UPDATE `img` SET `views` = '". ($item['views']+1) ."' WHERE `img`.`id` = {$item['id']}";
    mysqli_query($link, $sql);
}
echo str_replace('{Gallery}',$item_html,$html);