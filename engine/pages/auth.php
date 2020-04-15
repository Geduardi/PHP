<?php

function indexAction(){
    if ($_SERVER['REQUEST_METHOD'] =='POST'){
        if ($_POST['registration']){
            include "component/auth_register.php";
        } else {
            include "component/auth_entry.php";
        }
    }


    if (!empty($_GET['exit'])){
        session_destroy();
//        header('location: /?page=5');
        redirect('?page=5','Досвидания!');
    }

    if (empty($_SESSION['auth'])){
        $page_html = <<<HTML
<form method="post" >
    <fieldset class="entry_form"><legend>Вход</legend>
        <input type="text" name="login" placeholder="Login">
        <input type="text" name="password" placeholder="Password">
        <input type="submit"  value="Войти">
    </fieldset>
</form>

<form method="post" >
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
    <a href="?page=5&exit=1">Выход</a>
HTML;

    return $page_html;
}

function registerAction(){

}



