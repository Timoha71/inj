<?php
session_start(); ?>
<!doctype html>
<html>
<head>
<link href="Main_elements.css" rel="stylesheet" type="text/css">
<meta charset="utf-8">
<title>Injecs</title>
</head>
<body>
<div class="menu">
    <ul>
        <li><a href="index.php">Главная</a></li>


        <?php

        if(isset($_SESSION['role'])){
            if($_SESSION['role']==1)
            {
                //вкладки для админа
                echo "<li><a href='products.php'>Ассортимент</a></li>";
                echo "<li class='selected'><a href='check.php'>Просмотр заказов</a></li>";
                echo "<li><a href='logout.php'>Выйти из профиля администратора</a></li>";

            }}

        ?>
    </ul>
</div>

<div id="main">
    <p>Пользовательские заказы</p>
<table>
    <tr>
        <th>Автор заказа</th><th>Заказ</th><th>Стоимость</th><th>Доставка</th>
    </tr>
                 <?php //первая строка-установка временного пояса. в принципе не нужна, но не мешает
                 date_default_timezone_set('Europe/Moscow');
                 //6строк подключения к базе и настройки параметров. Сервер локальный, пользователь root, паролья нет, БД bestbar
                $mysqli = new mysqli("localhost", "root", "", "injecs");
//просто установка кодировок, чтобы не было символов стремных
                $mysqli->query("SET NAMES utf8");
                $mysqli->query("SET CHARACTER SET utf8");
                $mysqli->query("SET character_set_client = utf8");
                $mysqli->query("SET character_set_connection = utf8");
                $mysqli->query("SET character_set_results = utf8");
//запрос к бд с выбором всех данных из таблицы товары (product)
                $query = "SELECT id_book, author, book, deliv, cost FROM boooking WHERE status='2' ";
$summ=0;
if ($result = $mysqli->query($query)) //если запрос отрабатывается и не пустой, то входим в цикл
{
    while ($row = $result->fetch_assoc())
    {
        echo '<tr><td>'.$row["author"].'</td><td>'.$row["book"].'</td><td>'.$row["cost"].'</td><td>'.$row["deliv"].'</td>';

        echo " <td class='no_bord'><form action='done.php' method='get'>
              <input type='hidden' name='do' value='".$row['id_book']."'>
              <input class='b1' type='submit' value='Заказ готов'>
        </form></td>";
        echo '</tr>';
    }}
?></table><br>
    <br>
    <p>Отработанные заказы</p>
    <table>
    <?php //первая строка-установка временного пояса. в принципе не нужна, но не мешает
    date_default_timezone_set('Europe/Moscow');
    //6строк подключения к базе и настройки параметров. Сервер локальный, пользователь root, паролья нет, БД injecs
    $mysqli = new mysqli("localhost", "root", "", "injecs");
    //просто установка кодировок, чтобы не было символов стремных
    $mysqli->query("SET NAMES utf8");
    $mysqli->query("SET CHARACTER SET utf8");
    $mysqli->query("SET character_set_client = utf8");
    $mysqli->query("SET character_set_connection = utf8");
    $mysqli->query("SET character_set_results = utf8");
    //запрос к бд с выбором всех данных из таблицы товары (product)
    $query = "SELECT id_book, author, book, cost FROM boooking WHERE status='3' ";
    $summ=0;
    if ($result = $mysqli->query($query)) //если запрос отрабатывается и не пустой, то входим в цикл
    {
        while ($row = $result->fetch_assoc())
        {
            echo '<tr><td>'.$row["author"].'</td><td>'.$row["book"].'</td><td>'.$row["cost"].'</td></tr>';
        }}
    ?>
    </table>

</div>


</body>
</html>
