
<!doctype html>
<html>
<head>
    <link href="Main_elements.css" rel="stylesheet" type="text/css">
    <link href="log_css.css" rel="stylesheet" type="text/css">
    <meta charset="utf-8">
    <title>Injecs</title>
</head>
<body>
<div class="menu">
    <ul>
        <li><a href="index.php">Главная</a></li>
        <li><a href="about.php">О нас</a></li>
        <li><a href="products.php">Ассортимент</a></li>

        <?php
        session_start();
        if(isset($_SESSION['role'])){
            if($_SESSION['role']==1)
            {
//пусто, потому что ни админ, ни залогиненный пользователь не могут попасть на эту страницу
            }
            elseif($_SESSION['role']==2)
            {

            }
            else
            {
                echo "<li class="."selected"."><a href='login.php'>Войти/зарегистрироваться</a></li>";
            }}
        else
        {
            echo "<li class="."selected"."><a href='login.php'>Войти/зарегистрироваться</a></li>";
        }
        ?>
    </ul>
</div>

<div id="main">
    <br>
    <div class="logform"> <!--Форма входа с 3мя полями и кнопкой войти. Данные из полей передает в файл log.php, который добавит пользователя в БД-->
        <form action="log.php" method="post">
            <label for="text">Email</label><br>
            <input type="text" name="login" placeholder="Введите Ваш email"><br>
            <label for="text">Имя</label><br>
            <input type="text" name="name" placeholder="Введите Ваше имя"><br>
            <label for="text">Пароль</label><br>
            <input type="password" name="password"><br><br>
            <input class="b1" type="submit" value="Зарегистрироваться">
        </form> <!-- Если надо войти на сайт, переходим обратно к файлу входа-->
        <p>Уже зарегистрированы у нас? Нажмите, чтобы войти <a href='login.php'>Здесь</a>
    </div>

</div>

</body>
</html>
