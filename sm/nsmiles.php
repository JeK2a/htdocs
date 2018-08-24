<?php
//кидаем в один массив коды
$data[]="<img src=\"smiles/party.gif\" alt=\".party.\"/> .party.";
$data[]="<img src=\"smiles/phone.gif\" alt=\".phone.\"/> .phone.";
$data[]="<img src=\"smiles/present.gif\" alt=\".present.\"/> .present.";
$data[]="<img src=\"smiles/pya.gif\" alt=\".pya.\"/> .pya.";
$data[]="<img src=\"smiles/rain.gif\" alt=\".rain.\"/> .rain.";
$data[]="<img src=\"smiles/rose.gif\" alt=\".rose.\"/> .rose.";
$data[]="<img src=\"smiles/vis.gif\" alt=\".vis.\"/> .vis.";
$data[]="<img src=\"smiles/zubastik.gif\" alt=\".zubastik.\"/> .zubastik.";
$data[]="<img src=\"smiles/eda.gif\" alt=\".eda.\"/> .eda.";
$data[]="<img src=\"smiles/elka.gif\" alt=\".elka.\"/> .elka.";
$data[]="<img src=\"smiles/zloi.gif\" alt=\".zloi.\"/> .zloi.";
$data[]="<img src=\"smiles/kruzhka.gif\" alt=\".kruzhka.\"/> .kruzhka.";
$data[]="<img src=\"smiles/worry.gif\" alt=\".worry.\"/> .worry.";
$data[]="<img src=\"smiles/rolleyes.gif\" alt=\".rolleyes.\"/> .rolleyes.";
$data[]="<img src=\"smiles/sad.gif\" alt=\".sad.\"/> .sad.";
$data[]="<img src=\"smiles/sleep.gif\" alt=\".sleep.\"/> .sleep.";
$data[]="<img src=\"smiles/ooh.gif\" alt=\".ooh.\"/> .ooh.";
$data[]="<img src=\"smiles/mad.gif\" alt=\".mad.\"/> .mad.";
$data[]="<img src=\"smiles/eat.gif\" alt=\".eat.\"/> .eat.";
$data[]="<img src=\"smiles/blush.gif\" alt=\".blush.\"/> .blush.";
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
<card title="Новичку">
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
print "<a href=\"nsmiles.php?id=$id&amp;pass=$pass&amp;start=".($start-10)."\">".htmlspecialchars("<<<")."</a><br/>";
}
if($count1>$start+10)
{
print "<a href=\"nsmiles.php?id=$id&amp;pass=$pass&amp;start=".($start+10)."\"><br/>".htmlspecialchars(">>>")."</a><br/>";
}
print "<br/><a href=\"index.php?id=$id&amp;pass=$pass\">Смайлы</a>";
ob_end_flush();
?>
</p>
</card>
</wml>
