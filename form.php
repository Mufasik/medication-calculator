<?php
// разбиваем на название, кол-во, доза
function getItems(string $s) : array {
    $split = strpos($s, "(") ? strpos($s, "(") : strpos($s, " ");
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
        $pattern = "/\d+\s*шт/";
        if(preg_match_all($pattern, $s, $matches)) {
            $count = (int)$matches[0][0];
        } else {
            $errors[] = "Количество не найдено";
        }
    }

    $pattern = "/\s*\d+\s*г|мг|мл/";
    if(preg_match_all($pattern, $s, $matches)) {
        $dose = (int)$matches[0][0];
        //print_r($matches);
    }
        
    return ["name" => $name, "count" => $count, "dose" => $dose, "errors" => $errors];
}

// получаем и проверяем данные формы
$item = getItems(htmlspecialchars($_POST["name"]));
if (!$item["errors"]) {
    $total = intval($_POST["morning"] + $_POST["day"] + $_POST["evening"] + $_POST["night"]);
    $total = round($total * $_POST["days"] / $item["count"], 1);
    if ($total) {
        echo "Необходимо купить лекарство: $item[name] - $total шт";
    } else {
        $item["errors"][] = "Количество указано с ошибкой";
    }
}

foreach ($item["errors"] as $error) {
    echo "$error<br>";
}

echo "<pre>";
print_r($item);
print_r($_POST);
echo "</pre>";

?>