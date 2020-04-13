<?php

if ($_SESSION['auth']){
    if (!empty($_GET['action'])){
        $result = $_GET['action'] . 'CartAction';
        $result();
    }

    if (!empty($_SESSION['goods'])){
        foreach ($_SESSION['goods'] as $key => $value){
            $sum = $value[1]*$value[2];
            echo <<<HTML
            <div>
                   <h2>Товар: {$value[0]}</h2>
                   <h3>Цена: {$value[1]}</h3>
                   <h4>Количество в корзине: {$value[2]}</h4>
                   <h2>Сумма: $sum</h2>
                   <a href="?page=6&action=del&id=$key">Удалить из корзины</a>
                   <hr>
            </div>
HTML;
        }
    } else {
        echo "<h1>Корзина пуста</h1>";
    }
} else {
    echo "<h1>Нужно авторизоваться!</h1>";
}


