<?php
    session_start();

    const GALLERY_DIR = 'img';
    const GOODS = 'goods';
    const MSG = 'msg';
    const AUTH = 'auth';
    const ADMIN = 'admin'; //пароль: 123
    const NAME = 'name';
    const LOGIN = 'login';
    const USER_ID = 'user_id';
    include 'config/lib.php';
//    $page = getPage(include 'config/pages.php');
    $content = getContent();

//    ob_start();
//    include 'pages/' . $page;
//    $content = ob_get_clean();


    if (!empty($content)){
        echo str_replace(
            ['{HTML_TEXT}','{ENTRY}', '{Message}','{COUNT}'],
            [$content, include 'pages/component/main_entry.php', getMsg(),countBasket()],
            file_get_contents('../engine/main.html'));
    }




    