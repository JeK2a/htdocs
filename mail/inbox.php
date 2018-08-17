<?php

header("Content-Type:text/html; charset=UTF-8");

//$login  = 'vipjonpc@mail.ru';
//$pass   = '';
$login  = 'jek2ka2016@yandex.ru';
$pass   = 'Nokia3510!';

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