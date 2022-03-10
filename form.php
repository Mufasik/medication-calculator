<?php
// разбиваем на название, кол-во, доза
function getItems(string $s) : array {
    $split = strpos($s, '(') ? strpos($s, '(') : strpos($s, ' ');
    $name = $split ? substr($s, 0, $split) : $s;
    $errors = [];
    
    if (!$name) {
        $errors[] = "Название не указано";
    }
    $count = 0;
    $dose = 0;

    $pattern = "/[N№]\s*\d+/";
    if(preg_match_all($pattern, $s, $matches)) {
        $count = (int)(substr($matches[0][0], 1));
    } else {
        $errors[] = "Количество не найдено";
    }

    $pattern = "/\s*\d+\s*г|мг/";
    if(preg_match_all($pattern, $s, $matches)) {
        $dose = (int)$matches[0][0];
    } else {
        $errors[] = "Доза не найдена";
    }
    
    foreach ($errors as $err) {
        echo "$err<br>";
    }
    return ["name" => $name, "count" => $count, "dose" => $dose];
}

$item = getItems(htmlspecialchars($_POST['name']));

echo "Необходимо купить столько пачек";

echo "<pre>";
print_r($item);
echo "</pre>";    

echo "<pre>";
print_r($_POST);
echo "</pre>";

?>