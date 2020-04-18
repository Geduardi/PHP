<?php

function page_render($gallery_dir, $link, $id)
{
    $sql = "SELECT `id`, `name`, `size`, `descr`, `views` FROM `img` WHERE `id` = $id";
    $result = mysqli_query($link, $sql);

    $item = mysqli_fetch_assoc($result);

    $html = "
    <div style='font-size: 20px; margin: 20px 0'>
            <p>Название: {$item['name']}</p>
            <p>Размер: {$item['size']} КБ</p>
            <p>Категория: {$item['descr']}</p>
            <p>Просмотров: {$item['views']}</p>
            <img src=\"$gallery_dir\\{$item['name']}\" style='margin: 50px 0'>
    </div>
    ";
    $sql = "UPDATE img SET views = views + 1 WHERE img.id = {$item['id']}";
    mysqli_query($link, $sql) or die(mysqli_error($link));


    return $html;
}