<?php

if ($_SESSION['auth']){
    return <<<HTML
<form class="header__entry">
    <button name="page" value="5">Вы вошли как: {$_SESSION['login']}</button>
</form>
HTML;
} else {
    return <<<HTML
    <form class="header__entry">
        <button name="page" value="5">Войти</button>
    </form>
HTML;

}



