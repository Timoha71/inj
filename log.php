<?php
$user=$_POST["login"];
$pass=sha1($_POST["password"]);
$name=$_POST["name"];
//Получили переменные из полей регистрации
session_start();
date_default_timezone_set('Europe/Moscow');
$mysqli = new mysqli("localhost", "root", "", "injecs");

$mysqli->query("SET NAMES utf8");
$mysqli->query("SET CHARACTER SET utf8");
$mysqli->query("SET character_set_client = utf8");
$mysqli->query("SET character_set_connection = utf8");
$mysqli->query("SET character_set_results = utf8");

if ($mysqli->connect_errno) {
    printf("Ошибка соединения: %s\n", $mysqli->connect_error);
    exit();
} //Добавляем пользователяя в БД
$query1="Select * from users where login='$user'";
if (!$mysqli->query($query1))
echo 'Пользователь с данным логином уже существует в системе';
else 
{$mysqli->query("INSERT INTO users (login, name, password, role) VALUES ('$user', '$name', '$pass', 2)");


header('Location: /injecs/login.php'); }//зарегались и отправляемя логиниться

$mysqli->close();
?>