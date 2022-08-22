<?php
session_start(); ?>
<!doctype html>
<html>
<head>
<link href="catalog.css" rel="stylesheet" type="text/css">
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
            echo "<li class='selected'><a href='products.php'>Ассортимент</a></li>";
            echo "<li><a href='check.php'>Просмотр заказов</a></li>";
            echo "<li><a href='logout.php'>Выйти из профиля администратора</a></li>";

        }
        elseif($_SESSION['role']==2)
        {
            echo "<li><a href='about.php'>О нас</a></li>";
            echo "<li class='selected'><a href='products.php'>Ассортимент</a></li>";
            echo "<li><a href='logout.php'>Приветствуем, ".$_SESSION['name']."!</a></li>";
        }
        else
        {
            echo "<li><a href='about.php'>О нас</a></li>";
            echo "<li class='selected'><a href='products.php'>Ассортимент</a></li>";
            echo "<li><a href='login.php'>Войти/зарегистрироваться</a></li>";
        }}
    else
    {
        echo "<li><a href='about.php'>О нас</a></li>";
        echo "<li class='selected'><a href='products.php'>Ассортимент</a></li>";
        echo "<li><a href='login.php'>Войти/зарегистрироваться</a></li>";
    }
    ?>
   
  </ul>
</div>
<div class="category-wrap">
<h3>Каталог</h3>
	<ul>
		
		<li ><a href='nas_view.php'>Насосы</a></li>
		<li ><a href='tur_view.php'>Турбины</a></li>
		<li ><a href='naves_view.php'>Навесное оборудование</a></li>
		<li ><a href='hod_view.php'>Ходовая часть</a></li>
		<li ><a href='zap_view.php'>Запасные детали</a></li>
		<li ><a href='snother_view.php'>Другие детали</a></li>
	</ul>
</div>

<div id="main">

<p class="al-center"> <b>Каталог товаров</b></p>
<hr>
<div class="scale1"><a href="/injecs/nas_view.php"><img src="/injecs/img/nas.jpg" class="scale1"/>Насосы</a></div>
<div class="scale2"><a href="/injecs/tur_view.php"><img src="/injecs/img/tur.jpg"  class="scale2"/>Турбины</a></div>
<div class="scale3"><a href="/injecs/naves_view.php"><img src="/injecs/img/naves.jpg"  class="scale3"/>Навесное оборудование</a></div>
<div class="scale1"><a href="/injecs/zap_view.php"><img src="/injecs/img/zap.jpg"  class="scale2"/>Запасные детали</a></div>
<div class="scale2"><a href="/injecs/hod_view.php"><img src="/injecs/img/hod.jpg"  class="scale1"/>Ходовая часть</a></div>
<div class="scale3"><a href="/injecs/snother_view.php"><img src="/injecs/img/another.jpg"  class="scale3"/>Другие детали</a></div>

<?php
if (isset($_SESSION['role']))
{
if ($_SESSION['role']==2)
{
   echo "<div id='cart'>
        <a href='/injecs/cart_view.php'>Корзина</a>
    </div>";
   }
else 
{ 
if ($_SESSION['role']==1){
	 echo "<div id='cart1'>
        <a href='/injecs/products_update.php'>Обновление данных</a>
    </div>";
		 echo "<div id='cart2'>
        <a href='/injecs/add.php'>Добавление данных</a>
    </div>";
}   }

   } ?>
</div>


</body>
</html>
