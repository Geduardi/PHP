<?php
function getPage(array $pages){
    $pageNumber = 1;
    if (!empty($_GET['page'])){
        $pageNumber = $_GET['page'];
    }
    if (empty($pages[$pageNumber])){
        $pageNumber = 1;
    }
    return $pages[$pageNumber];
}

function getContent(){
    $page = getPage(include 'pages.php');
    $fileName = getFileName($page);
    if (!file_exists($fileName)){
        $fileName = getFileName('index');
    }
    include $fileName;
    $action = 'index';
    if (!empty($_GET['action'])){
        $action = $_GET['action'];
    }
    if (!function_exists($action . 'Action')){
        $action = 'index';
    }
    $actionName = $action . 'Action';
    return $actionName();
}

function getFileName($file)
{
    return dirname(__DIR__) . "/pages/" . $file;
}

function getId()
{
    if (!empty($_GET['id'])) {
        return (int)$_GET['id'];
    }

    return 0;
}

function getConnection(){
    static $link;
    if (empty($link)){
        $link = mysqli_connect('localhost', 'root', '', 'GB');
    }
    return $link;
}

function redirect($path = '', $msg = '')
{
    if (!empty($msg)) {
        $_SESSION[MSG] = $msg;
    }

    if (empty($path)) {
        $path = $_SERVER['HTTP_REFERER'];
    }

    header('Location: ' . $path);
}

function getMsg()
{
    $msg = '';
    if (!empty($_SESSION[MSG])) {
        $msg = $_SESSION[MSG];
        unset($_SESSION[MSG]);
    }

    return $msg;
}

function countBasket()
{
    if (empty($_SESSION[GOODS])) {
        return 0;
    }

    return count($_SESSION[GOODS]);
}

function clearStr($str)
{
    return mysqli_real_escape_string(getConnection(), strip_tags((trim($str))));
}

function isAdmin()
{
    return $_SESSION[ADMIN];
}