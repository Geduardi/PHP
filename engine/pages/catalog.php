<?php

function indexAction(){
    return allAction();
}

function allAction(){

    $sql = "SELECT `id`, `img_name`, `item_name`, `price` FROM `items` ORDER BY `views` DESC";

    $result = mysqli_query(getConnection(), $sql);
    $gallery_html = '<script src="js/main.js"></script><div class="gallery">';
    $constant = 'constant';
    while ($row = mysqli_fetch_assoc($result)){
        $gallery_html .= "
        <div class='gallery_box'>
            <a href=\"?page=2&id={$row['id']}&action=one\"><img src=\"{$constant('GALLERY_DIR')}/{$row['img_name']}\" style=\"width: 50%\"></a>
            <p onclick='addGoodInBasket({$row['id']})' style='cursor: pointer')>В корзину</p>
        </div>";
    }
    $gallery_html .= "</div>";
    return $gallery_html;
}

function oneAction(){
    $id = getId();
    $sql = "SELECT `id`, `img_name`, `item_name`, `price`, `description`, `views` FROM `items` WHERE `id` =" . $id;
    $result = mysqli_query(getConnection(), $sql);

    $item = mysqli_fetch_assoc($result);
    $constant = 'constant';
    $html = "
<script src=\"js/main.js\"></script>
    <div style='font-size: 20px; margin: 20px 0'>
            <img src=\"{$constant('GALLERY_DIR')}/{$item['img_name']}\" style='margin: 50px 0; max-height: 50vh'>
            <h2>{$item['item_name']}</h2>
            <h4>Цена: {$item['price']} р.</h4>
            <h4>Просмотров: {$item['views']}</h4>
            <p><a href='?page=6&action=add&id=$id'>В корзину</a></p>
            <p>{$item['description']}</p>
    </div>
    ";
    $sql = "UPDATE items SET views = views + 1 WHERE items.id = {$item['id']}";
    mysqli_query(getConnection(), $sql) or die(mysqli_error(getConnection()));

    return $html . include 'review.php';
}