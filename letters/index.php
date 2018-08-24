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
print '<card title="Письма">'.
'<p>';
//авторизация успешна
if($login) {
print 'Письма, пролежавшие на сервере более одной недели, удаляются! Сохраняйте важные данные!<br/>';
@mysql_query("DELETE FROM `".$px.$ltable."` WHERE `time` < ".(time() - 7*24*3600).";");
$q_letters_in = @mysql_query("select * from `".$px.$ltable."` where to_user='".$login['login']."' and new=1;");
$q_letters_to = @mysql_query("select * from `".$px.$ltable."` where from_user='".$login['login']."';");
$num_in = @mysql_num_rows($q_letters_in);
$num_to = @mysql_num_rows($q_letters_to);
print '<a href="inbox.php?id='.$id.'&amp;pass='.$pass.'">Входящие('.$num_in.')</a><br/>'.
'<a href="draft.php?id='.$id.'&amp;pass='.$pass.'">Исходящие('.$num_to.')</a><br/>'.
'<a href="sendform.php?id='.$id.'&amp;pass='.$pass.'">Написать</a><br/>';
print "<br/><a href=\"../enter.php?id=$id&amp;pass=$pass\">Прихожая</a><br/>";
		} else { print "Ошибка авторизации!<br/>"; }
print '</p>'.
'</card>'.
'</wml>';
//разрываем соединение с бд
@mysql_close();
ob_end_flush();
?>
