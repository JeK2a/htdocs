<?php
//пихаем картинки в массив
$data[]="<img src=\"smiles/warning.gif\" alt=\".warning.\"/> .warning.";
$data[]="<img src=\"smiles/dont.gif\" alt=\".dont.\"/> .dont.";
$data[]="<img src=\"smiles/ban.gif\" alt=\".ban.\"/> .ban.";
$data[]="<img src=\"smiles/killer.gif\" alt=\".killer.\"/> .killer.";
$data[]="<img src=\"smiles/4moks.gif\" alt=\".4moks.\"/>.4moks.";
$data[]="<img src=\"smiles/aaa.gif\" alt=\".aaa.\"/>.aaa.";
$data[]="<img src=\"smiles/bann.gif\" alt=\".bann.\"/>.bann.";
$data[]="<img src=\"smiles/cvetochek.gif\" alt=\".cvetochek.\"/>.cvetochek.";
$data[]="<img src=\"smiles/dead.gif\" alt=\".dead.\"/>.dead.";
$data[]="<img src=\"smiles/gey.gif\" alt=\".gey.\"/>.gey.";
$data[]="<img src=\"smiles/idu.gif\" alt=\".idu.\"/>.idu.";
$data[]="<img src=\"smiles/kill.gif\" alt=\".kill.\"/>.kill.";
$data[]="<img src=\"smiles/lozung.gif\" alt=\".lozung.\"/>.lozung.";
$data[]="<img src=\"smiles/medik.gif\" alt=\".medik.\"/>.medik.";
$data[]="<img src=\"smiles/nunu.gif\" alt=\".nunu.\"/>.nunu.";
$data[]="<img src=\"smiles/otk.gif\" alt=\".otk.\"/>.otk.";
$data[]="<img src=\"smiles/sigareta.gif\" alt=\".sigareta.\"/>.sigareta.";
$data[]="<img src=\"smiles/uwelnafig.gif\" alt=\".uwelnafig.\"/>.uwelnafig.";
$data[]="<img src=\"smiles/vau2.gif\" alt=\".vau2.\"/>.vau2.";
$data[]="<img src=\"smiles/vip.gif\" alt=\".vip.\"/>.vip.";
$data[]="<img src=\"smiles/wpion.gif\" alt=\".wpion.\"/>.wpion.";
$data[]="<img src=\"smiles/killer2.gif\" alt=\".killer2.\"/>.killer2.";
$data[]="<img src=\"smiles/killer3.gif\" alt=\".killer3.\"/>.killer3.";
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
<card title="Модерам">
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
print "<a href=\"msmiles.php?id=$id&amp;pass=$pass&amp;start=".($start-10)."\">".htmlspecialchars("<<<")."</a><br/>";
}
if($count1>$start+10)
{
print "<a href=\"msmiles.php?id=$id&amp;pass=$pass&amp;start=".($start+10)."\"><br/>".htmlspecialchars(">>>")."</a><br/>";
}
print "<br/><a href=\"index.php?id=$id&amp;pass=$pass\">Смайлы</a>";
ob_end_flush();
?>
</p>
</card>
</wml>
