<?php
$r = rand(0,100000);
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
print '<card title="Написать">'.
'<p>';
//авторизирован?
if($login) {
print 'Кому:<br/>'.
'<input type="text" name="to'.$r.'" value="'.$to.'"/><br/>'.
'Тема:<br/>'.
'<input type="text" name="subject"/><br/>'.
'Письмо:<br/>'.
'<input type="text" name="letter"/><br/>'.
'<anchor>Отправить<go href="send.php?id='.$id.'&amp;pass='.$pass.'" method="post">'.
'<postfield name="to" value="$(to'.$r.')"/>'.
'<postfield name="subject" value="$(subject)"/>'.
'<postfield name="letter" value="$(letter)"/>'.
'</go></anchor><br/>';
print "<anchor>Назад<prev/></anchor><br/>";
print "<a href=\"../enter.php?id=$id&amp;pass=$pass\">Прихожая</a><br/>";
		} else { print "Ошибка авторизации!"; }
print '</p>'.
'</card>'.
'</wml>';
//разрываем соединение с базой
@mysql_close();
ob_end_flush();
?>