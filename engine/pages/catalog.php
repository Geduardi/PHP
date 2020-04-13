<?php

function gallery_render($gallery_dir, $link){

    $sql = "SELECT `id`, `img_name`, `item_name`, `price` FROM `items` ORDER BY `views` DESC";

    $result = mysqli_query(getConnection(), $sql);
    $gallery_html = '<div class="gallery">';
    while ($row = mysqli_fetch_assoc($result)){
        $gallery_html .= "
        <div class='gallery_box'>
            <a href=\"?page=3&id={$row['id']}\"><img src=\"$gallery_dir\\{$row['img_name']}\" style=\"width: 50%\"></a>
            <a href='?page=6&id={$row['id']}&action=add' class='gallery_deleteBtn'>В корзину</a>
        </div>";
    }
    $gallery_html .= "</div>";
    return $gallery_html;
}



echo $page_html = "<h1>Галлерея</h1>" . gallery_render(GALLERY_DIR, getConnection());