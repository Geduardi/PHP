<?php
if (empty($_POST['login']) || empty($_POST['password']) || empty($_POST['name'])){
    header('location: /?page=5');
    exit();
}
$login  =  $_POST['login'];
$password = $_POST['password'];
$name = $_POST['name'];

$sql = "INSERT INTO `users` (`fio`, `login`, `password`) VALUES ('$name','$login','" . password_hash($password,PASSWORD_DEFAULT) . "')";
echo $sql;
mysqli_query(getConnection(),$sql) or die(mysqli_error(getConnection()));


$_SESSION['auth'] = true;
$_SESSION['login'] = $login;
$_SESSION['name'] = $name;


//header('location: /?page=5');
redirect('?page=5');