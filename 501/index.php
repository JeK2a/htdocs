<?php

echo '<pre>';
echo __FILE__.' - '.__LINE__."\n";
var_dump($_SERVER["REQUEST_URI"]);
echo '</pre>';

$url = $_SERVER["REQUEST_URI"];


if ($url != mb_strtolower($url)) {
    $url = mb_strtolower($url);

    header("HTTP/1.1 301 Moved Permanently");
    header("Location: ".$url);
}

if (substr($url,-1,1) == '/') {
    $url = substr($url,0,-1);

    header("HTTP/1.1 301 Moved Permanently");
    header("Location: ".$url);
}

if (false) {
    $this->insert404Page($_SERVER['REQUEST_URI']);
    header("HTTP/1.0 404 Not Found");
    header("Location: /404.html");
}