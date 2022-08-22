<?php
session_start();
$id_book = $_GET['do'];
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

$query = "UPDATE boooking SET status = '3' where id_book='".$id_book."'";

$mysqli->query ($query);

header('Location: /injecs/check.php');

$mysqli->close();
?>