<?php
    do {
        $content .= <<<HTML
            <h2><a href="?page=3&action=one&orderId={$order['id']}">Заказ №{$order['id']}</a></h2>  
            <h4>Статус заказа: {$order['status']}</h4>
            <p>ID пользователя: {$order['user_id']}</p> 
HTML;
    } while ($order = mysqli_fetch_assoc($result));

