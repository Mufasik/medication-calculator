<!DOCTYPE html>
<head>
    <title>Калькулятор лекарств</title>
    <meta charset="utf-8">
</head>

<body>
    <form action="form.php" method="post" enctype="multipart/form-data">
        Введите название лекарства с сайта 
        <a href="https://www.medgorodok.ru/" target="_blank"> медгородок</a>
        <br><br>
        <input type="text" name="name">
        <ul> Сколько штук в день
        <li><input type="text" name="day"></li>
        </ul>
        Сколько дней принимать
        <input type="text" name="days">
        <input type="submit" value="Отправить">
    </form>
    <?php echo "PHP " . phpversion(); ?> 
</body>