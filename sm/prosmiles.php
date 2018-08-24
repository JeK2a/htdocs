<?php
//пихаем данные в массив
$data[]="<img src=\"smiles/sleza.gif\" alt=\".sleza.\"/> .sleza.";
$data[]="<img src=\"smiles/chmok.gif\" alt=\".chmok.\"/> .chmok.";
$data[]="<img src=\"smiles/ne.znayu.gif\" alt=\".ne.znayu.\"/> .ne.znayu.";
$data[]="<img src=\"smiles/jump.gif\" alt=\".jump.\"/> .4mok.";
$data[]="<img src=\"smiles/good.gif\" alt=\".good.\"/> .good.";
$data[]="<img src=\"smiles/chmak.gif\" alt=\".chmak.\"/> .chmak.";
$data[]="<img src=\"smiles/tired.gif\" alt=\".tired.\"/> .tired.";
$data[]="<img src=\"smiles/confused.gif\" alt=\".confused.\"/> .confused.";
$data[]="<img src=\"smiles/cool.gif\" alt=\".cool.\"/> .cool.";
$data[]="<img src=\"smiles/eek.gif\" alt=\".eek.\"/> .eek.";
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
<card title="Продвинутым людям">
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
print "<a href=\"prosmiles.php?id=$id&amp;pass=$pass&amp;start=".($start-10)."\">".htmlspecialchars("<<<")."</a><br/>";
}
if($count1>$start+10)
{
print "<a href=\"prosmiles.php?id=$id&amp;pass=$pass&amp;start=".($start+10)."\"><br/>".htmlspecialchars(">>>")."</a><br/>";
}
print "<br/><a href=\"index.php?id=$id&amp;pass=$pass\">Смайлы</a>";
ob_end_flush();
?>
</p>
</card>
</wml>
