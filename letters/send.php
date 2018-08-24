<?php
if(empty($to)) $error=$error."Ник получателя пуст!<br/>";
if(empty($subject)) $error=$error."Не введена тема!<br/>";
if(empty($letter)) $error=$error."Сообщение пусто!<br/>";
//посылаем заголовки
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
//печатаем страницу
print '<?xml version="1.0" encoding="utf-8"?>'.
'<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN"'.
' "http://www.wapforum.org/DTD/wml_1.1.xml">'.
'<wml><head><meta http-equiv="Cache-Control" content="no-cache" forua="true"/></head>';
//включаем конфигурационный файл
include "../ini.php";
//авторизация
$login = autorize();
//продолжаем вывод в браузер
print '<card title="Отправка письма">'.
'<p align="center">';
$query_to = mysql_query("select * from `".$px.$utable."` where login='".$to."';");
$to_data = mysql_fetch_array($query_to);
//ид пуст
if(empty($id))
print "Логин пуст!<br/>";
//авторизирован?
if($login) {
//ошибок нет?
if(!empty($error)) { print $error; } else {
if($to == $to_data['login']) {
//запрос в базу
@mysql_query("insert into `".$px.$ltable."` values(0,'".$login['login']."','$to','$subject','$letter','".time()."',1);");
//писмьмо отпарвлено
print "<b>Ваше письмо отправлено!</b><br/>"; } else {
print "<b>Такого пользователя не существует!</b><br/>";
}
}
print "<anchor>Назад<prev/></anchor><br/>";
//ссылка на прихожую
print "<a href=\"../enter.php?id=$id&amp;pass=$pass\">Прихожая</a><br/>";
} else { print "Ошибка авторизации!"; }
print '</p>'.
'</card>'.
'</wml>';
//разрываем соединение с бд
@mysql_close();
ob_end_flush();
?>
