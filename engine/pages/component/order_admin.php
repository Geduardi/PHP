<?php
    do {
        $sql = "";
        $orderStatusResult =
        $content .= <<<HTML
        <form action="?page=3&action=upd" method="post">
            <h2><a href="?page=3&action=one&orderId={$order['id']}">Заказ №{$order['id']}</a></h2>  
            <h4>Статус заказа: <input name="status" value="{$order['status']}">
            <input type="submit" value="Сохранить изменения"></h4>
            <p>ID пользователя: {$order['user_id']}</p> 
             <input type="hidden" value="{$order['id']}" name="orderId">
        </form>
HTML;
    } while ($order = mysqli_fetch_assoc($result));

