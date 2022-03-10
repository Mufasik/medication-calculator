<!DOCTYPE html>
<head>
    <title>Калькулятор лекарств</title>
    <meta charset="utf-8">
</head>

<body>
    <form action="form.php" method="post" enctype="multipart/form-data">
        Введите название лекарства<br><br>
        <input type="text" name="name">
        <ul> Сколько штук 
        <li><input type="text" name="morning"> утром</li>
        <li><input type="text" name="day"> днем</li>
        <li><input type="text" name="evening"> вечером</li>
        <li><input type="text" name="night"> на ночь</li>
        </ul>
        Сколько дней принимать
        <input type="text" name="days">
        <input type="submit" value="Отправить">
    </form>
</body>