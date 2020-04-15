<?php
    session_start();

    const GALLERY_DIR = 'img';
    const GOODS = 'goods';
    const MSG = 'msg';
    const AUTH = 'auth';
    include 'config/lib.php';
//    $page = getPage(include 'config/pages.php');
    $content = getContent();

//    ob_start();
//    include 'pages/' . $page;
//    $content = ob_get_clean();


    if (!empty($content)){
        echo str_replace(
            ['{HTML_TEXT}','{ENTRY}', '{Message}'],
            [$content, include 'pages/component/main_entry.php', getMsg()],
            file_get_contents('../engine/main.html'));
    }




    