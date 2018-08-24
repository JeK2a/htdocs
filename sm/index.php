<?php
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
print "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
?>
<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN"
"http://www.wapforum.org/DTD/wml_1.1.xml">
<wml><head><meta http-equiv="Cache-Control" content="no-cache" forua="true"/></head>
<?php include "../ini.php"; ?>
<card title="Смайлы">
<p align="center">
<?php
print "Цветные смайлы, доступные:<br/>";
print "<a href=\"./prsmiles.php?id=$id&amp;pass=$pass\">Прохожему</a><br/>";
print "<a href=\"./nsmiles.php?id=$id&amp;pass=$pass\">Новичку</a><br/>";
print "<a href=\"./psmiles.php?id=$id&amp;pass=$pass\">Пользователю</a><br/>";
print "<a href=\"./prosmiles.php?id=$id&amp;pass=$pass\">Продвинутому пользователю</a><br/>";
print "<a href=\"./chsmiles.php?id=$id&amp;pass=$pass\">Чаттеру</a><br/>";
print "<a href=\"./tsmiles.php?id=$id&amp;pass=$pass\">Тусовщику</a><br/>";
print "<a href=\"./pochsmiles.php?id=$id&amp;pass=$pass\">Почетному чаттеру</a><br/>";
print "<a href=\"./msmiles.php?id=$id&amp;pass=$pass\">Модерам</a><br/>";
print "<a href=\"./asmiles.php?id=$id&amp;pass=$pass\">Админам</a><br/>";
print "<br/><a href=\"../help.php?id=$id&amp;pass=$pass\">Помощь</a><br/>";
print "<a href=\"../enter.php?id=$id&amp;pass=$pass\">Прихожая</a>";
ob_end_flush();
?>
</p>
</card>
</wml>
