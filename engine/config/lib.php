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

function addCartAction(){
    $id = getId();

    if (!$id){
        exit;
    }
    $sql = "SELECT `id`, `item_name`, `price` FROM `items` WHERE `id` =" . $id;
    $result = mysqli_query(getConnection(), $sql);
    $item = mysqli_fetch_assoc($result);
    if (empty($_SESSION['goods'][$id])){
        $count = 1;
        $_SESSION['goods'][$id] = [$item['item_name'],$item['price'], $count];
    } else {
        $_SESSION['goods'][$id][2]++;
    }

}

function delCartAction(){
    $id = getId();
    if (!$id){
        exit;
    }
    if (!empty($_SESSION['goods'][$id])){
       if ($_SESSION['goods'][$id][2] > 1){
           $_SESSION['goods'][$id][2]--;
       } else {
           unset($_SESSION['goods'][$id]);
       }
    }
}
