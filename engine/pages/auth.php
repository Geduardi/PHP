<?php

function indexAction(){
    if (empty($_SESSION[AUTH])){
        $page_html = <<<HTML
<form method="post" action="?page=5&action=login">
    <fieldset class="entry_form"><legend>Вход</legend>
        <input type="text" name="login" placeholder="Login">
        <input type="text" name="password" placeholder="Password">
        <input type="submit"  value="Войти">
    </fieldset>
</form>

<form method="post" action="?page=5&action=register">
    <fieldset class="entry_form"><legend>Регистрация</legend>
        <input type="text" name="login" placeholder="Login">
        <input type="text" name="password" placeholder="Password">  
        <input type="text" name="name" placeholder="Name">
        <input type="submit" value="Регистрация">
        <input type="hidden" name="registration" value="true">
    </fieldset>
</form>
HTML;
    } else $page_html = <<<HTML
    <h1>Добро пожаловать, {$_SESSION['name']}!</h1>
    <p>Вы вошли как: {$_SESSION['login']}</p>
    <a href="?page=5&action=logout">Выход</a>
HTML;

    return $page_html;
}


function loginAction(){
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        redirect('?page=5', 'Что-то пошло не так');
        return;
    } else {
        include "component/auth_entry.php";
    }
}

function logoutAction(){
        session_destroy();//
        redirect('?page=5','Досвидания!');
        return;
}

function registerAction(){
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        redirect('?page=5', 'Что-то пошло не так');
        return;
    } else {
        include "component/auth_register.php";
    }
}



