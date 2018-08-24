<?php
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
print '<card title="Просмотр письма">'.
'<p>';
//авторизирован?
if($login) {
//делаем запрос
@mysql_query("update `".$px.$ltable."` set new=0 where id='$id_letter';");
$query = @mysql_query("select * from `".$px.$ltable."` where id='$id_letter';");
$letter = @mysql_fetch_array($query);
//время и дата
$time = date("d.m.Y H:i",$letter['time']);
//выводим письмо
print "[".$time."]<br/><u>От:</u>&nbsp;".$letter['from_user']."<br/><u>Тема:</u>&nbsp;".$letter['subject']."<br/><u>Письмо:</u>&nbsp;".$letter['letter'];
print "<br/><a href=\"sendform.php?id=$id&amp;pass=$pass&amp;to=".$letter['from_user']."\">Ответить</a><br/>";
print "<anchor>Назад<prev/></anchor><br/>";
print "<a href=\"../enter.php?id=$id&amp;pass=$pass\">Прихожая</a><br/>";
} else { print "Ошибка авторизации!"; }
print '</p>'.
'</card>'.
'</wml>';
//разрываем соединение с бд
@mysql_close();
ob_end_flush();
?>
