<?php
    $uRL = "https://www.currency-calc.com/USD_UAH";
    $content = file_get_contents($uRL);
    $pattern = "/1 dollar.* (\d+.\d+) hryvnias/i";
    preg_match_all($pattern, $content, $arrayOfMatches);
    $dollarToHryvnia = $arrayOfMatches[1][0];
    /* - - - - - - - - - - - - - - - - - - - - - - - - - */
    if (is_numeric($_GET['number'])) {
        if ($_GET['number'] > 0) {
            $dollars = $_GET["number"];
            $result = $dollars * $dollarToHryvnia;
            echo "<p class=\"center\">Course: $dollarToHryvnia</p>";
            echo "<p class=\"center\">$dollars dollars = $result hryvnias</p>";
        } else {
            echo "<p class=\"center\">Введите число не ниже нуля!</p>";
        }
    } else {
        echo "<p class=\"center\">Введите число а не текст!</p>";
    }
?>
<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8">
        <title>Converter</title>
        <link rel="stylesheet"
              href="css/style.css">
    </head>
    <body>
        <form method="get">
            <div id="center">
                <div>Введите сумму в долларах</div>
                <p>
                    <input type="text"
                           name="number">
                </p>
                <p>
                    <input type="submit"
                           value="Отправить">
                </p>
            </div>
        </form>
    </body>
</html>