<?php
function galery_render($gallery_dir, $link){

    $sql = "SELECT `id`, `name`, `size`, `descr`, `views` FROM `img` ORDER BY `views` DESC";

    $result = mysqli_query($link, $sql);
    $gallery_html = '';
    while ($row = mysqli_fetch_assoc($result)){
        $gallery_html .= "
            <a href=\"?item={$row['id']}\" target=\"_blank\"><img src=\"$gallery_dir\\{$row['name']}\" style=\"width: 30vw\"></a>
        ";
    }

return $gallery_html;
}



