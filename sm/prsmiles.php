<?php
//записываем в массив коды картинок
$data[]="<img src=\"smiles/smirk.gif\" alt=\".smirk.\"/> .smirk.";
$data[]="<img src=\"smiles/snow.gif\" alt=\".snow.\"/> .snow.";
$data[]="<img src=\"smiles/str.gif\" alt=\".str.\"/> .str.";
$data[]="<img src=\"smiles/sun.gif\" alt=\".sun.\"/> .sun.";
$data[]="<img src=\"smiles/sunny.gif\" alt=\".sunny.\"/> .sunny.";
$data[]="<img src=\"smiles/notsure.gif\" alt=\".notsure.\"/> .notsure.";
$data[]="<img src=\"smiles/clock.gif\" alt=\".clock.\"/> .clock.";
$data[]="<img src=\"smiles/vopros.gif\" alt=\".vopros.\"/> .vopros.";
$data[]="<img src=\"smiles/smile.gif\" alt=\".smile.\"/> .smile.";
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
<card title="Прохожим">
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
print "<a href=\"prsmiles.php?id=$id&amp;pass=$pass&amp;start=".($start-10)."\">".htmlspecialchars("<<<")."</a><br/>";
}
if($count1>$start+10)
{
print "<a href=\"prsmiles.php?id=$id&amp;pass=$pass&amp;start=".($start+10)."\"><br/>".htmlspecialchars(">>>")."</a><br/>";
}
print "<br/><a href=\"index.php?id=$id&amp;pass=$pass\">Смайлы</a>";
ob_end_flush();
?>
</p>
</card>
</wml>
