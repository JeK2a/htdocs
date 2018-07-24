<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>

    <meta charset="utf-8" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" type="text/css" href="/old/css/style.css"/>

    <script src="/save/js/jquery-1.6.2.js" type="text/javascript"></script>

    <title>Test</title>
</head>
<body>

<?php

header('Content-type: text/html; charset=utf-8');

$text = "Аргентина манит негра";

$tmp = "";

for ($i = 0; $i < strlen($text); $i++) {
    if ($text[$i] != " ") {
        $tmp .=  $text[$i];
    }
}

$text =  mb_strtolower($tmp);

$tmp = "";

echo $text . "<br>";

$n = strlen($text);



for ($i = 0; $i < ($n / 2); $i++) {
    echo $i . " - " . $text[$i] . " = " . $text[$n - $i - 1] . "<br>";
//        $tmp .= $text[$i];
//        echo $text[$i];
}

//$text = $tmp;

    echo "<p>$text</p>";

?>

<!--<table id="t" class="d">-->
<!--    <tr>-->
<!--        <td class="c">Текст</td>-->
<!--    </tr>-->
<!--</table>-->
<!--    <script src="/js/script.js" type="text/javascript"></script>-->
</body>
</html>