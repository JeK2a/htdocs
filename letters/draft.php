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
print '<card title="Исходящие">'.
'<p>';
//авторизация успешна?
if($login) {
if(empty($start)) $start = 0;
if($start < 0) $start = 0;
//писем на страницу
$pnumber = 5;
//запросы в бд
$tot = @mysql_query("select count(*) from `".$px.$ltable."` where from_user='".$login['login']."';");
$lets = @mysql_query("select * from `".$px.$ltable."` where from_user='".$login['login']."' order by time desc limit ".$start.",".$pnumber.";");
//если запросы успешны
if($tot && $lets) {
$total = @mysql_fetch_array($tot);
$count = $total['count(*)'];
while($data = @mysql_fetch_array($lets))
{
$from=$data['from_user'];
$to=$data['to_user'];
$time=$data['time'];
$subject=$data['subject'];
$letter=$data['letter'];
$new=$data['new'];
$id_letter=$data['id'];
$time = date("d.m.Y H:i", $time);
print "<a href=\"view.php?id=$id&amp;pass=$pass&amp;id_letter=$id_letter\">$subject [$time]</a><br/>";
}
}
if($start > 0)
print "<a href=\"?id=$id&amp;pass=$pass&amp;room=$room&amp;start=".($start-$pnumber)."\">Предыдущие</a>";
if($count > $start + $pnumber)
print "<a href=\"?id=$id&amp;pass=$pass&amp;room=$room&amp;start=".($start+$pnumber)."\"><br/>Следующие</a>";
print "<anchor>Назад<prev/></anchor><br/>";
print "<a href=\"../enter.php?id=$id&amp;pass=$pass\">Прихожая</a><br/>";
		} else { print "Ошибка авторизации!"; }
print '</p>'.
'</card>'.
'</wml>';
//разрываем соединение
@mysql_close();
ob_end_flush();
?>