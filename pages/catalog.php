<?php

function gallery_render($gallery_dir, $link){

    $sql = "SELECT `id`, `img_name`, `item_name`, `price` FROM `img` ORDER BY `views` DESC";

    $result = mysqli_query($link, $sql);
    $gallery_html = '<div class="gallery">';
    while ($row = mysqli_fetch_assoc($result)){
        $gallery_html .= "
            <a href=\"?page=3&id={$row['id']}\"><img src=\"$gallery_dir\\{$row['img_name']}\" style=\"width: 50%\"></a>
        ";
    }
    $gallery_html .= "</div>";
    return $gallery_html;
}



echo $page_html = "<h1>Галлерея</h1>" . gallery_render(GALLERY_DIR, $link);