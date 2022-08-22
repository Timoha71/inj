<?php
$mysqli = new mysqli("localhost", "root", "", "injecs");
$mysqli->query("SET NAMES utf8");
$mysqli->query("SET CHARACTER SET utf8");
$mysqli->query("SET character_set_client = utf8");
$mysqli->query("SET character_set_connection = utf8");
$mysqli->query("SET character_set_results = utf8");
$type=$_POST['type'];	
$new_name=$_POST['new_name'];
$new_cost=$_POST['new_cost'];
$new_amount=$_POST['new_amount'];
$new_img="/injecs/img/".$_POST['new_img'];

$mysqli->query("insert into product (name_prod, cost,  amount, img, type)
values ('$new_name','$new_cost','$new_amount', '$new_img', '$type');");




$mysqli->close();
header('location: /injecs/add.php');	
?>