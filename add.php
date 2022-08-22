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
    <li><a href="products.php">Вернуться к ассортименту</a></li>

   
  </ul>
</div>

<div id="main">

<?php 
$mysqli = new mysqli("localhost", "root", "", "injecs");
$mysqli->query("SET NAMES utf8");
$mysqli->query("SET CHARACTER SET utf8");
$mysqli->query("SET character_set_client = utf8");
$mysqli->query("SET character_set_connection = utf8");
$mysqli->query("SET character_set_results = utf8");

$query="Select distinct type from product";
echo '<form action="add2.php" method="post">
<p>Категория товара: <select name="type">';

if ($result=$mysqli->query($query))
{
while ($row=$result->fetch_assoc())
	{
		echo '<option>'.$row['type'].'</option>';
	}
}
?>
</select></p>
Наименование товара: <input type="text" name="new_name" value= "<?php if(isset($_POST['new_name'])) echo $_POST['new_name'];?>"><br><br>
Стоимость товара: <input type="text" name="new_cost" value= "<?php if(isset($_POST['new_cost'])) echo $_POST['new_cost'];?>"><br><br>
Есть в наличии: <input type="text" name="new_amount" value= "<?php if(isset($_POST['new_amount'])) echo $_POST['new_amount'];?>"><br><br>
Изображение товара: <input type="text" name="new_img" value= "<?php if(isset($_POST['new_img'])) echo $_POST['new_img'];?>"><br><br>
<button type="submit">Добавить товар</button>
</form>

<div id='cart'>
<a href='/injecs/products_update.php'>Обновление данных</a>
</div>


</div>


</body>
</html>
