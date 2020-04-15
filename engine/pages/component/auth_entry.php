<?php
if (empty($_POST['login']) || empty($_POST['password'])){
    redirect('?page=5','Неправильный ввод');
    exit();
}
$login  =  clearStr($_POST['login']);
$password = $_POST['password'];
$sql = "SELECT id, login, fio, password, isAdmin FROM users WHERE login='$login'";
$result = mysqli_query(getConnection(),$sql);
$row = mysqli_fetch_assoc($result);
if (empty($row)){
    redirect('?page=5','Нет такого пользователя');
    exit;
}

if (password_verify($password,$row['password'])){
    $_SESSION[AUTH] = true;
    $_SESSION[LOGIN] = $login;
    $_SESSION[NAME] = $row['fio'];
        $_SESSION[ADMIN] = $row['isAdmin'];
    $_SESSION[USER_ID] = $row['id'];
} else {
    redirect('?page=5','Неправильный пароль');
    exit;
}
//header('location: /?page=5');
redirect('?page=5','Успешный вход');
exit;