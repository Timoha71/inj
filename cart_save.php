<?php
session_start();
$book = ' ';
$method=$_GET['radio'];
$addr=$_GET['addr'];
if ($method==1) $method='Самовывоз из магазина';
else $method=$addr;
date_default_timezone_set('Europe/Moscow');
$mysqli = new mysqli("localhost", "root", "", "injecs");
$mysqli->query("SET NAMES utf8");
$mysqli->query("SET CHARACTER SET utf8");
$mysqli->query("SET character_set_client = utf8");
$mysqli->query("SET character_set_connection = utf8");
$mysqli->query("SET character_set_results = utf8");
$summ=0;
if ($mysqli->connect_errno) {
    printf("Ошибка соединения: %s\n", $mysqli->connect_error);
    exit();
}
$query = "select * FROM boooking WHERE status='1' and author='".$_SESSION['log']."'";
if ($result = $mysqli->query($query))
{
    while ($row = $result->fetch_assoc())
    {
    $book .= $row['book']."(".$row['amount']."шт);";
    $summ+=$row['cost']*$row['amount'];
    }}
$mysqli->query ("INSERT INTO boooking(author, book,  cost, status, deliv) VALUES ('".$_SESSION['log']."','".$book."', $summ, 2,'".$method."')");
$mysqli->query("Delete from boooking WHERE status='1' and author='".$_SESSION['log']."'");
header('Location: /injecs/cart_view.php'); 

$mysqli->close();
?>