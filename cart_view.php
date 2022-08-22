<?php
session_start(); ?>
<!doctype html>
<html>
<head>
<link href="Main_elements.css" rel="stylesheet" type="text/css">
<link href="catalog.css" rel="stylesheet" type="text/css">
<meta charset="utf-8">
<title>Injecs</title>
</head>
<body>
<div class="menu">
<ul>
    <li><a href="products.php">Вернуться к ассортименту</a></li>

  <script>
function Selected(a) {
  var label = a.value;
    if (label=="2") {
       document.getElementById("addr").style.display='block';
   } else {
       document.getElementById("addr").style.display='none';
   } 
}
</script>
 
  </ul>
</div>

<div id='main'>
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
				$q_count="select count(*) FROM boooking WHERE status='1' and author='".$_SESSION['log']."'";
$count_q=$mysqli->query($q_count);
    $num_rows= $count_q->fetch_row();
    $count = $num_rows[0];
				if ($count != 0)              
			 { $query = "SELECT author, book, cost, amount FROM boooking WHERE status='1' and author='".$_SESSION['log']."'";
		
echo "<br><table>
    <tr>
        <th>Наименование товара</th><th>Стоимость</th><th>Количество</th>
    </tr>";
            		
$summ=0;
if ($result = $mysqli->query($query)) //если запрос отрабатывается и не пустой, то входим в цикл
{
    while ($row = $result->fetch_assoc()) //рассматриваем выборку из таблицы product в качестве аасоциативного массива(звучит страшно вроде), но по факту
                                            //просто помещаем знаения полей таблицы в массив row
    {//делаем вывод всех товаров на страницу. Говорим php вывести нам html таблицу с 3 столбцами.
        //1 столбец - изображение
        echo '<tr><td>'.$row["book"].'</td><td>'.$row["cost"].'</td><td>'.$row["amount"].'</td></tr>';
        $summ+=$row['cost']*$row['amount']; //считаем общую стоимость товаров в корзине

    }
}
echo '</table><br>';
  
   echo "Общая стоимость заказа: ".$summ; //показываем стоимость товаров
 
    echo "<form action='cart_clean.php'>
    <input type='submit' value='Очистить корзину'>
    </form>

    <form action='cart_save.php'>
    <input type='submit' value='Оформить заказ  '>

    <br>
	<p><b>Метод доставки: </b></p>
	
	<div class='form_radio_btn'>
	<input id='radio-1' type='radio' name='radio' value='1' aria-required='true' onChange='Selected(this)' checked >
	<label for='radio-1'>Самовывоз из магазина</label>
</div>
 
<div class='form_radio_btn'>
	<input id='radio-2' type='radio' name='radio' value='2' aria-required='true' onChange='Selected(this)'>
	<label for='radio-2'>Курьерская доставка</label>
</div>

<p><input id='addr' name='addr' style='display: none;' placeholder='Введите адрес доставки' size='50'></p>
	    </form>
	<hr>
	<p><b>*Напоминаем, что оплата в нашем магазине производится только по факту получения товара клиентом</b></p>
	";

}
else 
echo "<br><b>Корзина пуста</b><br>";
?>



    <?php
    $query1 = "SELECT count(*) FROM boooking WHERE status='2' and author='".$_SESSION['log']."'";
    $result = $mysqli->query($query1);
    $num_rows= $result->fetch_row();
    $count = $num_rows[0];
    if ($count!=0)
    {
        echo "<b>Заказы на подтверждении:</b> \n";
		echo '<table><tr><th>Заказ</th><th>Сумма заказа</th></th>';
        $query1 = "Select * FROM boooking WHERE status='2' and author='".$_SESSION['log']."'";
    if ($result = $mysqli->query($query1))
    {
    while ($row = $result->fetch_assoc())
    {
        
               echo '<tr><td>'.$row["book"].'</td><td>'.$row["cost"].'</td></tr>';

    }}echo '</table>';}


    ?>
</div>


</body>
</html>
