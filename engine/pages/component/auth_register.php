<?php
if (empty($_POST['login']) || empty($_POST['password']) || empty($_POST['name'])){
    redirect('?page=5','Успешная регистрация');
    return;
}
$login  =  clearStr($_POST['login']);
$password = clearStr($_POST['password']);
$name = clearStr($_POST['name']);

if (loginDuplicate($login)) {
    redirect('?page=5','Такой пользователь уже существует!');
    return;
}

$sql = "INSERT INTO `users` (`fio`, `login`, `password`) VALUES ('$name','$login','" . password_hash($password,PASSWORD_DEFAULT) . "')";
mysqli_query(getConnection(),$sql) or die(mysqli_error(getConnection()));


$_SESSION[AUTH] = true;
$_SESSION[LOGIN] = $login;
$_SESSION[NAME] = $name;
$_SESSION[USER_ID] = mysqli_insert_id(getConnection());

//header('location: /?page=5');
redirect('?page=5','Успешная регистрация');
return;

function loginDuplicate($login){
    $sql = "SELECT login FROM users WHERE login='$login'";
    $result = mysqli_query(getConnection(),$sql);
    return mysqli_fetch_assoc($result);
}