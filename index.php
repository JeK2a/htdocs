<?php

header("Content-Type:text/html; charset=UTF-8");

//$login  = 'vipjonpc@mail.ru';
//$pass   = '';
$login  = 'jek2ka2016@yandex.ru';
$pass   = '';
//$server = 'pop.mail.ru';
//$port   = 110;
//$nevedomaya_xernya = 10;
//
//$f = fsockopen($server, $port,$errno,$errstr,$nevedomaya_xernya);
//
//if (!$f) {
//    die("Не удается подключиться к pop.mail.ru: [$errno] $errstr");
//}
//
//echo $s = fgets($f);
//
//if (strpos($s,'+OK')!==0) {
//    die('ошибка подключения');
//}
//
//fwrite($f,"USER $login\r\n");
//fwrite($f,"PASS $pass\r\n");
//
//echo $s = fgets($f);
//
//if (strpos($s,'+OK')!==0) {
//    die('ошибка авторизации');
//}
//
//fwrite($f,"TOP 1 1000\r\n");
//
//$msg = '';
//$head = '';
//
//while (false !== ($s=fgets($f))) {
//    if ($s === ".\r\n") {
//        break;
//    }
//
//    if ($s == "\r\n" && !$msg) {
//        $msg = ' ';
//    }
//
//    if (!$msg) {
//        $head .= $s;
//    } else {
//        $msg .= $s;
//    }
//}
//
//echo trim($head);
//echo "\n\n---конец заголовков---\n\n";
//echo trim($msg);


//$mail = imap_open('{pop.mail.ru:995/novalidate-cert/pop3/ssl}', $login, $pass);
$mail = imap_open('{imap.yandex.ru:993/novalidate-cert/imap/ssl}', $login, $pass);

//$mail = imap_open('{mail.server.com:143}', 'username', 'password'); // открываем IMAP-соединение

//$mail = imap_open('{mail.server.com:110/pop3}', 'username', 'password'); // или открываем POP3-соединение

echo '<pre>';
echo __FILE__.' - '.__LINE__."\n";
var_dump($mail);
echo '</pre>';

$headers = imap_headers($mail); // берем список всех почтовпочтовыхых заголовков

echo '<pre>';
echo __FILE__.' - '.__LINE__."\n";
var_dump($headers);
echo '</pre>';

$last = imap_num_msg($mail); // берем объект заголовка для последнего сообщения в почтовом ящике

$header = imap_header($mail, $last);

$body = imap_body($mail, $last); // выбираем тело для того же сообщения

echo '<pre>';
echo __FILE__.' - '.__LINE__."\n";
var_dump($last, $body);
echo '</pre>';

imap_close($mail); // закрываем соединение