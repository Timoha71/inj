<?php
$mysqli = new mysqli("localhost", "root", "", "injecs");
$mysqli->query("SET NAMES utf8");
$mysqli->query("SET CHARACTER SET utf8");
$mysqli->query("SET character_set_client = utf8");
$mysqli->query("SET character_set_connection = utf8");
$mysqli->query("SET character_set_results = utf8");
	
$name_prod=$_POST['name_prod'];
$new_cost=$_POST['new_cost'];
$new_amount=$_POST['new_amount'];

if ($new_cost!="" and $new_amount!="")
{
$mysqli->query("Update product set cost='$new_cost', amount='$new_amount' where name_prod='$name_prod' ;");
}




$mysqli->close();
header('location: /injecs/products_update.php');	
?>