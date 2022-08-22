<?php //ФАЙЛ главной страницы. ЗАПУСК СЕССИИ. Нужен, после аутентификации пользователя на странице.
    session_start(); ?>
<!doctype html>
<html>
<head>
    <!-- Подключаем к файлу 2 .css файла, которые содержат оформления-->
<link href="Main_elements.css" rel="stylesheet" type="text/css">
<link href="slider.css" rel="stylesheet" type="text/css">
<meta charset="utf-8"> <!--Установили кодировку страницы utf-8 (чтобы не было символов стремных на страницы (особенно могут появится из за БД)) -->
<title>Injecs</title>
</head>
<body>
<div class="menu">
<ul><!--Список (наши вкладки) с ссылками на другие страницы. Выбранная владка меняет цвет, благодаря классу selected, который описан в css файле -->
    <li class="selected"><a href="index.php">Главная</a></li><!-- На этой странице выбрана первая вкладка ее и делаем селектед-->


    <?php
//ЗДЕСЬ ПРОПИСАНО, что в зависимости от значения роли по разному называть вкладки
    if(isset($_SESSION['role'])){
    if($_SESSION['role']==1)
        {
            //вкладки для админа
            echo "<li><a href='products.php'>Ассортимент</a></li>";
            echo "<li><a href='check.php'>Просмотр заказов</a></li>";
            echo "<li><a href='logout.php'>Выйти из профиля администратора</a></li>";

        }
    elseif($_SESSION['role']==2)
        {
            //вкладки для пользователя
            echo "<li><a href='about.php'>О нас</a></li>";
            echo "<li><a href='products.php'>Ассортимент</a></li>";
            //Используем имя аутентифицированного пользователя
            echo "<li><a href='logout.php'>Приветствуем, ".$_SESSION['name']."!</a></li>";
        }
    else
    {
        //ДВА БЛОКА else используем для неаутентифицироанного пользователя(то есть если первыый раз просто зашел и не логинился)
        echo "<li><a href='about.php'>О нас</a></li>";
        echo "<li><a href='products.php'>Ассортимент</a></li>";
        echo "<li><a href='login.php'>Войти/зарегистрироваться</a></li>";
    }}
    else
        {
            echo "<li><a href='about.php'>О нас</a></li>";
            echo "<li><a href='products.php'>Ассортимент</a></li>";
            echo "<li><a href='login.php'>Войти/зарегистрироваться</a></li>";
        }
    ?>
  </ul>
</div>

<div id="main">
    <div id="info">
        <br>Injecs<br>
        
<!-- Описываем слайдер с двумя картинками. Это его тело, оформления слайдера происходит в slider.css файле -->
        <div class="wrapper1">
            <input type="radio" name="point" id="slide1" checked>
            <input type="radio" name="point" id="slide2">
           

            <div class="slider">
                <div class="slides slide1"></div>
                <div class="slides slide2"></div>
               

            </div>
            <div class="controls">
                <label for="slide1"></label>
                <label for="slide2"></label>
               

            </div>
        </div>
        <div id = "main_bot"><br><br><br>
            <p>ООО ИНЖЭКС - топливная аппаратура и запчасти для спецтехники        <p>Адрес
            <p>195197, г. Санкт-Петербург, Полюстровский проспект, д. 59ф, оф. 356      <p>Время работы
            <p>Ежедневно с 9:00 до 20:00 Мск <p>Филиал в г. Москве

<p>129110, г. Москва, пер. Орлово-Давыдовский, д.1, э.1, п.III, ком.3, оф.100

<p>Филиал в г. Санкт-Петербурге

<p>195197, г. Санкт-Петербург, Полюстровский проспект, д. 59ф, оф. 356

<p>Филиал в г. Иваново
<p>153035, г. Иваново, 1-я Полевая улица, 31, оф. 5
        </div>
        </div>
</div>


</body>
</html>
