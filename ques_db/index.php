<?php
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
print "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
?>
<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN"
"http://www.wapforum.org/DTD/wml_1.1.xml">
<wml><head><meta http-equiv="Cache-Control" content="no-cache" forua="true"/></head>
<? include "../ini.php"; ?>
<card title="Добавление вопрсов">
<p align="center">
<?php
mysql_query("truncate table `".$px.$qtable."`");
$file=file("ques.txt");
for($i=0;$i<count($file);$i++) {
$ex=explode("::",$file[$i]);
mysql_query("insert into `".$px.$qtable."` values(0,'".trim($ex[0])."','".trim($ex[1])."');");
//mysql_query("insert into ques values(0,'Кто ты?','я');");
}
print count($file);
?>
</p>
</card>
</wml>
