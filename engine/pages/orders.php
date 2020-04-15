<?php

function indexAction(){
    if (!$_SESSION[AUTH]){
        redirect('?page=5','Необходимо авторизоваться!');
        return;
    }
    if (!isAdmin()){
        return allAction($_SESSION[USER_ID]);
    }
    return allAction();
}

function prepareAction(){
    if (!$_SESSION[AUTH]){
        redirect('','Необходимо авторизоваться!');
        return;
    }
    if (empty($_SESSION[GOODS])){
        redirect('','Нельзя оформить заказ с пустой корзиной');
        return;
    }
    return <<<HTML
    <form action="?page=3&action=makeOrder" method="post">
        <h4>Введите адрес доставки:</h4>
        <input type="text" style="width: 30vw;height: 30px;" name="address" minlength="3"><br>
        <input type="submit" value="Завершить" style="width: 30vw; height: 30px;">
    </form>
HTML;

}

function makeOrderAction(){
    if ($_SERVER['REQUEST_METHOD'] != 'POST'){
        redirect('','Что-то пошло не так');
        return;
    }
    if (!$_POST['address']){
        redirect('','Нужно ввести адресс');
        return;
    }
    $sql = "INSERT INTO `orders` (`user_id`, `adress`) VALUES ('{$_SESSION[USER_ID]}', '{$_POST['address']}')";
    mysqli_query(getConnection(),$sql) or die(mysqli_error(getConnection()));
    $orderId = mysqli_insert_id(getConnection());
    renderOrder($orderId);
    return <<<HTML
    <h1>Заказ оформлен!</h1>
    <a href="?page=3&action=one&orderId=$orderId">Просмотреть заказ</a>
    <a href="?page=3">Перейти к заказам</a>    
HTML;

}

function renderOrder($orderId){
    foreach ($_SESSION[GOODS] as $itemId => $item){
        $sql = "INSERT INTO `order_items` (order_id,item_id,price,`count`) VALUES ('$orderId', '$itemId','{$item['price']}','{$item['count']}')";
        mysqli_query(getConnection(),$sql) or die(mysqli_error(getConnection()));
    }
    unset($_SESSION[GOODS]);
}

function allAction($userId = 0){
    if (!$userId){
        $sql = "SELECT `id`, `user_id`, `adress`, `status` FROM `orders`";
        $profile = 'admin';
    } else {
        $sql = "SELECT `id`, `user_id`, `adress`, `status` FROM `orders` WHERE user_id =$userId";
        $profile = 'user';
    }

    $result = mysqli_query(getConnection(), $sql);
    $content = '<h1>Заказы:</h1>';
    $order = mysqli_fetch_assoc($result);
    if (!$order){
        $content .= "<h2>У вас нет заказов.</h2>";
    } else{
        include 'component/order_' . $profile . '.php';
    }

    return $content;
}

function oneAction(){
    if (empty($_GET['orderId'])){
        redirect('','Что-то пошло не так');
        return;
    }
    $sql = "SELECT `item_id`, `price`, `count` FROM `order_items` WHERE `order_id` = '{$_GET['orderId']}'";
    $result = mysqli_query(getConnection(), $sql);
    $content = "<h1>Заказ №{$_GET['orderId']}</h1>";
    $sum =0;
    while ($order = mysqli_fetch_assoc($result)){
        $sum += $order['price'];
        $content .= <<<HTML
            <h2><a href="?page=2&action=one&id={$order['item_id']}">Товар №{$order['item_id']}</a></h2>
            <h3>Стоимость: {$order['price']}</h3>
            <h4>Количество: {$order['count']}</h4>
HTML;

    }
    return $content .= <<<HTML
    <h1>Общая стоимость заказа: $sum</h1>
    <a href="?page=3">К заказам</a>
HTML;

}

function updAction(){
    if ($_SERVER['REQUEST_METHOD'] != 'POST'){
        redirect('/','Что-то пошло не так');
        return;
    }
    $str = "UPDATE `orders` SET `status` = '{$_POST['status']}' WHERE `orders`.`id` = {$_POST['orderId']} ";
    mysqli_query(getConnection(),$str);
    redirect('','Статус изменен');
    return;
}