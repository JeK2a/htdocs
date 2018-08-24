<?php
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
print '<?xml version="1.0" encoding="utf-8"?>';
print '<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN"'.
' "http://www.wapforum.org/DTD/wml_1.1.xml">'.
'<wml><head><meta http-equiv="Cache-Control" content="no-cache" forua="true"/></head>';
include "./ini.php";
print '<card title="Статистика!">'.
'<p>';
$query_users = @mysql_query("select * from `".$px.$utable."` where id='".$id."';");
$q = @mysql_query("select * from `".$px.$utable."` order by posts desc limit 10;");
$q1 = @mysql_query("select * from `".$px.$utable."` where sex='m';");
$q2 = @mysql_query("select * from `".$px.$utable."` where sex='zh';");
$data = @mysql_fetch_array($query_users);
$login = autorize();
if(empty($id))
print "Логин пуст!<br/>";
if($login) {
switch($mod) {
//режим админов
case 'admins':
$q = @mysql_query("select `login`,`posts` from `".$px.$utable."` where admin>0 and moder>0;");
print "Админы чата:<br/>";
while($arr = @mysql_fetch_array($q)) {
++$i; print "<b>$i.</b>".$arr['login']." - ".$arr['posts']."<br/>"; }
break;
//режим модеров
case 'moders':
$q = @mysql_query("select `login`,`posts` from `".$px.$utable."` where moder=1 and admin=0;");
print "Наши модеры:<br/>";
while($arr = @mysql_fetch_array($q)) {
++$i; print "<b>$i.</b>".$arr['login']." - ".$arr['posts']."<br/>"; }
break;
//режим киллеров
case 'killers':
$q = @mysql_query("select `login`,`posts` from `".$px.$utable."` where moder=2 and admin=0;");
print "Наши киллеры:<br/>";
while($arr = @mysql_fetch_array($q)) {
++$i; print "<b>$i.</b>".$arr['login']." - ".$arr['posts']."<br/>"; }
break;
//режим киллеров
case 'topmoder':
$q = @mysql_query("select `login`,`posts` from `".$px.$utable."` where moder=4 and admin=0;");
print "Наши высшие модеры:<br/>";
while($arr = @mysql_fetch_array($q)) {
++$i; print "<b>$i.</b>".$arr['login']." - ".$arr['posts']."<br/>"; }
break;
//режим киллеров
case 'shpion':
$q = @mysql_query("select `login`,`posts` from `".$px.$utable."` where moder=3 and admin=0;");
print "Наши шпионы:<br/>";
while($arr = @mysql_fetch_array($q)) {
++$i; print "<b>$i.</b>".$arr['login']." - ".$arr['posts']."<br/>"; }
break;
//режим статистики умных
case 'stats':
$q = @mysql_query("select * from `".$px.$utable."` order by vposts desc limit 10;");
print "Десятка самых умных:<br/>";
while($arr = @mysql_fetch_array($q)) { 
++$i; print "<b>$i.</b>".$arr['login']." - ".$arr['vposts']."<br/>"; }
break;
//режим самых разговорчивых
case '10top':
$q = @mysql_query("select * from `".$px.$utable."` order by posts desc limit 10;");
print "Десятка самых разговорчивых:<br/>";
while($arr = @mysql_fetch_array($q)) {
++$i; print "<b>$i.</b>".$arr['login']." - ".$arr['posts']."<br/>"; }
break;
//по умолчанию
default:
print "Число парней: ".@mysql_num_rows($q1)." <br/>";
print "Число девушек: ".@mysql_num_rows($q2)." <br/>";
print "<a href=\"statistic.php?id=$id&amp;pass=$pass&amp;mod=admins\">Админы</a><br/>";
print "<a href=\"statistic.php?id=$id&amp;pass=$pass&amp;mod=moders\">Модеры</a><br/>";
print "<a href=\"statistic.php?id=$id&amp;pass=$pass&amp;mod=killers\">Киллеры</a><br/>";
print "<a href=\"statistic.php?id=$id&amp;pass=$pass&amp;mod=shpion\">Шпионы</a><br/>";
print "<a href=\"statistic.php?id=$id&amp;pass=$pass&amp;mod=topmoder\">Высшие модеры</a><br/>";
print "<a href=\"statistic.php?id=$id&amp;pass=$pass&amp;mod=10top\">10 Топ</a><br/>";
print "<a href=\"statistic.php?id=$id&amp;pass=$pass&amp;mod=stats\">10 Умников</a><br/>";
break;
}
if($mod)
print "<br/><a href=\"statistic.php?id=$id&amp;pass=$pass\">Статистика</a><br/>";
if($room)
print "<a href=\"room.php?id=$id&amp;pass=$pass&amp;room=$room\">В чат</a><br/>";
else
print "<a href=\"enter.php?id=$id&amp;pass=$pass\">Прихожая</a><br/>";
	} else { print $lang['not_loged']; }
//разрываем соединение с базой
@mysql_close();
print '</p>'.
'</card>'.
'</wml>';
ob_end_flush();
?>
