<?php
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
}
$mysqli->query("DELETE FROM boooking WHERE status='1' and author='".$_SESSION['log']."'");


header('Location: /injecs/products.php'); //зарегались и отправляемя логиниться

$mysqli->close();
?>