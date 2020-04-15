<?php


function addAction(){
    if ($_SESSION['auth']){
        $id = getId();

        if (!$id){
            redirect('?p=2', 'Что-то пошло не так');
            return;
        }
        $sql = "SELECT `id`, `item_name`, `price` FROM `items` WHERE `id` =" . $id;
        $result = mysqli_query(getConnection(), $sql);
        $item = mysqli_fetch_assoc($result);
        if (empty($_SESSION[GOODS][$id])){
            $count = 1;
            $_SESSION[GOODS][$id] = [
                'name' => $item['item_name'],
                'price' => $item['price'],
                'count' => $count];
        } else {
            $_SESSION[GOODS][$id]['count']++;
        }
        redirect("", 'Товар добавлен в корзину');
        return;

    } else {
        redirect('?p=2', 'Нужно авторизоваться!');
        return;
    }

}

function delAction(){
    if (!empty($_SESSION['auth'])){
        $id = getId();
        if (!$id){
            return false;
        }
        if (!empty($_SESSION[GOODS][$id])){
            if ($_SESSION[GOODS][$id]['count'] > 1){
                $_SESSION[GOODS][$id]['count']--;
            } else {
                unset($_SESSION[GOODS][$id]);
            }
        }
        redirect("", 'Товар удален из корзины');
        return;
    } else {
        return "<h1>Нужно авторизоваться!</h1>";
    }
}

function indexAction(){
    if ($_SESSION['auth']){
        $content = '<h1>Корзина</h1>';
        if (empty($_SESSION[GOODS])){
            return $content . '<h4>Товаров нет</h4>';
        }
        foreach ($_SESSION[GOODS] as $itemId => $item){
            $sum = $item['price']*$item['count'];
            $content .= <<<HTML
            <div>
                   <h2>Товар: {$item['name']}</h2>
                   <h3>Цена: {$item['price']}</h3>
                   <h4>Количество в корзине: {$item['count']}</h4>
                   <h2>Сумма: $sum</h2>
                   <a href="?page=6&action=del&id=$itemId">Удалить из корзины</a>
                   <hr>
            </div>
HTML;
        }
        return $content;
    } else {
        return "<h1>Нужно авторизоваться!</h1>";
    }
}




