<?php
if (empty($_POST['login']) || empty($_POST['password'])){
    header('location: /?page=5');
    exit();
}
$login  =  $_POST['login'];
$password = $_POST['password'];
$sql = "SELECT id, login, fio, password FROM users WHERE login='$login'";
$result = mysqli_query(getConnection(),$sql);
$row = mysqli_fetch_assoc($result);
if (empty($row)){
    header('location: /?page=5');
}

if (password_verify($password,$row['password'])){
    $_SESSION['auth'] = true;
    $_SESSION['login'] = $login;
    $_SESSION['name'] = $row['fio'];
}
header('location: /?page=5');