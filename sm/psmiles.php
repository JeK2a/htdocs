<?php
//записываем в массив смайлы
$data[]="<img src=\"smiles/hohol.gif\" alt=\".hohol.\"/> .hohol.";
$data[]="<img src=\"smiles/ill.gif\" alt=\".ill.\"/> .ill.";
$data[]="<img src=\"smiles/kisa.gif\" alt=\".kisa.\"/> .kisa.";
$data[]="<img src=\"smiles/tongue.gif\" alt=\".tongue.\"/> .tongue.";
$data[]="<img src=\"smiles/urgh.gif\" alt=\".urgh.\"/> .urgh.";
$data[]="<img src=\"smiles/wink.gif\" alt=\".wink.\"/> .wink.";
$data[]="<img src=\"smiles/ulibka.gif\" alt=\".ulibka.\"/> .ulibka.";
$data[]="<img src=\"smiles/boggle.gif\" alt=\".boggle.\"/> .boggle.";
$data[]="<img src=\"smiles/huh.gif\" alt=\".huh.\"/> .huh.";
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
print "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
?>
<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN"
"http://www.wapforum.org/DTD/wml_1.1.xml">
<wml><head><meta http-equiv="Cache-Control" content="no-cache" forua="true"/></head>
<?php
//включаем конфигурационный файл
include "../ini.php";
?>
<card title="Пользователям">
<p>
<?php
$i=count($data);
$count=$i;
$count1=$count;
if(empty($start))
$start=0;
$start=intval($start);
if($start<0)
$start=0;
if($count>$start+10) $count=$start+10;
for($i=$start;$i<$count;$i++)
{
print $data["$i"]."<br/>";
}
if($start!=0)
{
print "<a href=\"psmiles.php?id=$id&amp;pass=$pass&amp;start=".($start-10)."\">".htmlspecialchars("<<<")."</a><br/>";
}
if($count1>$start+10)
{
print "<a href=\"psmiles.php?id=$id&amp;pass=$pass&amp;start=".($start+10)."\"><br/>".htmlspecialchars(">>>")."</a><br/>";
}
print "<br/><a href=\"index.php?id=$id&amp;pass=$pass\">Смайлы</a>";
ob_end_flush();
?>
</p>
</card>
</wml>
