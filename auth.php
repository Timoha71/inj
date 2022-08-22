<?php
$user=$_POST["login"]; //получили переменные из полей входа
$pass=sha1($_POST["password"]); //полученный пароль сразу зашшифровали
session_start();
date_default_timezone_set('Europe/Moscow');
$mysqli = new mysqli("localhost", "root", "", "injecs"); //аналогичное подключение к БД

$mysqli->query("SET NAMES utf8");
$mysqli->query("SET CHARACTER SET utf8");
$mysqli->query("SET character_set_client = utf8");
$mysqli->query("SET character_set_connection = utf8");
$mysqli->query("SET character_set_results = utf8");

if ($mysqli->connect_errno) { //Если нет ошибки подключени к БД идем дальше
    printf("Ошибка соединения: %s\n", $mysqli->connect_error);//если есть, пишем что есть ошибка
    exit();
}

$query = "SELECT * FROM users WHERE login='$user'"; //выбрали данные из таблицы users где логин = тому, что ввели при входе
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        if ($row["login"]==$user and $row["password"]==($pass))	{ //если логин и пароль соответсвтуют тем, которые в базе, то все гуд, а именно:
            $_SESSION['role']=$row["role"];
            $_SESSION['name']=$row["name"];
            $_SESSION['log']=$row["login"];
            // приравниваем 3 переменные, которые могут передаваться между файлами: $_SESSION['name'] будет имя пользователя
            // роль - соответственно его роль



            if ($row["role"]=='1') { //перенаправляем после входа на главную страницу, но уже с правами пользователя или админа. написал 4 строками, можно было
               header('Location: /injecs/index.php');break;};                  //просто перенаправить на главную, но от этого ничего не меняется
            if ($row["role"]=='2') {
                header('Location: /injecs/index.php');break;}
        }
    }
    exit ("Извините, введённый вами Логин/Пароль неверный."); //если ввели неверные данные, покажем стремную белю страницу с надписью
    $result->free();
}
$mysqli->close();
?>