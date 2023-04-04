<?php
function prnt($array) {
    echo '<pre>';
    print_r($array);
    echo '</pre>';
}

function sum() {
    if ($_POST['n1'] != '' && $_POST['n2'] != '') {
        $result = (int)$_POST['n1'] + (int)$_POST['n2'];
    } else {
        $result = (int)'Заполните числа!';
    }

    echo $result;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input type="text" name="n1" placeholder="число 1">
        <br>
        <input type="text" name="n2" placeholder="число 2">
        <br>
        <button type="submit">Посчитать</button>
    </form>
    <p>Результат: <?php sum() ?></p>
</body>
</html>