<?php
session_start();
$product=$_GET["cart1"];
$cost=$_GET["cart2"];
$amount=$_GET["cart3"];
$name=$_SESSION['log'];


//Получили переменные из полей регистрации
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
$mysqli->query("INSERT INTO boooking (author, book, cost, status, amount) VALUES ('$name', '$product', '$cost', 1, '$amount'  )");


header('Location: /injecs/products.php'); //зарегались и отправляемя логиниться

$mysqli->close();
?>