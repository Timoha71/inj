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

<p class="al-center"> Каталог навесного оборудования</p>

<table ><!-- Здесь начали описывать таблицу и ниже обозвали 3 наших столбика-->
   
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
                $query = "SELECT img, name_prod, cost, amount FROM product where type = 'навесное'";
if (isset($_SESSION['role']) and $_SESSION['role']==1)
 echo '<tr>
        <th>Изображение</th><th>Наименование товара</th><th>Стоимость</th><th>Количество товара в наличии</th></tr>';
else echo '<tr><th>Изображение</th><th>Наименование товара</th><th>Стоимость</th><th>Количество товара в наличии</th></tr>';

if ($result = $mysqli->query($query)) //если запрос отрабатывается и не пустой, то входим в цикл
{
    while ($row = $result->fetch_assoc()) //рассматриваем выборку из таблицы product в качестве аасоциативного массива(звучит страшно вроде), но по факту
                                            //просто помещаем знаения полей таблицы в массив row
    {//делаем вывод всех товаров на страницу. Говорим php вывести нам html таблицу с 3 столбцами.
        //1 столбец - изображение
      
if (isset($_SESSION['role']) and $_SESSION['role']==1) {
	  echo "<tr><td><img src='".$row["img"]."'".'></td><td>'.$row["name_prod"].'</td><td>'.$row["cost"].'</td><td>'.$row["amount"].'</td>';
}
else 
{if ($row['amount'] !=0)
echo "<tr><td><img src='".$row["img"]."'".'></td><td>'.$row["name_prod"].'</td><td>'.$row["cost"].'</td><td>'.$row["amount"].'</td>';
else echo "<tr><td><img src='".$row["img"]."'".'></td><td>'.$row["name_prod"].'</td><td>'.$row["cost"].'</td><td>Нет в наличии</td>';}

        $_SESSION['cart']=$row["name_prod"];
       if (isset($_SESSION['role'])) //проверка логинился ли какой-то пользователь
       {
        if (isset($_SESSION['role']) and $_SESSION['role']==2) //добавление кнопок добавления в корзину и корзина для пользователей с ролью 2 (залогиненые неявляющиесяадминистратором)
        {
       echo " <td class='no_bord'><form action='cart.php' method='get'>
              <input type='hidden' name='cart1' value='".$row['name_prod']."'>
                <input type='hidden' name='cart2' value='".$row['cost']."'>
				<button type='button' onclick='this.nextElementSibling.stepDown()'>-</button>
<input type='number' min='1' name='cart3' max='100' value='1' class='raz'>
<button type='button' onclick='this.previousElementSibling.stepUp()'>+</button>
                <input class='b1' type='submit' value='Добавить в корзину'>
        </form></td>";

        echo '</tr>';}
        else {echo '</tr>'; }}
        else {echo '</tr>'; }
    }
}
?>
</table>
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
