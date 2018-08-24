<?php
$data[]="<img src=\"smiles/admin.gif\" alt=\".admin.\"/>.admin.";
$data[]="<img src=\"smiles/alc.gif\" alt=\".alc.\"/>.alc.";
$data[]="<img src=\"smiles/blya.gif\" alt=\".blya.\"/>.blya.";
$data[]="<img src=\"smiles/chapaev.gif\" alt=\".chapaev.\"/>.chapaev.";
$data[]="<img src=\"smiles/fuckyou.gif\" alt=\".fuckyou.\"/>.fuckyou.";
$data[]="<img src=\"smiles/invalid.gif\" alt=\".invalid.\"/>.invalid.";
$data[]="<img src=\"smiles/khekhe.gif\" alt=\".khekhe.\"/>.khekhe.";
$data[]="<img src=\"smiles/pop.gif\" alt=\".pop.\"/>.pop.";
$data[]="<img src=\"smiles/prizrak.gif\" alt=\".prizrak.\"/>.prizrak.";
$data[]="<img src=\"smiles/solnca.gif\" alt=\".solnca.\"/>.solnca.";
$data[]="<img src=\"smiles/trah.gif\" alt=\".trah.\"/>.trah.";
$data[]="<img src=\"smiles/upl.gif\" alt=\".upl.\"/>.upl.";
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
print "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
?>
<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN"
"http://www.wapforum.org/DTD/wml_1.1.xml">
<wml><head><meta http-equiv="Cache-Control" content="no-cache" forua="true"/></head>
<?php
//ЄR-дЁ?га жЁR--лc д c<
include "../ini.php";
?>
<card title="Админам">
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
print "<a href=\"asmiles.php?id=$id&amp;&amp;pass=$pass&amp;start=".($start-10)."\">".htmlspecialchars("<<<")."</a><br/>";
}
if($count1>$start+10)
{
print "<a href=\"asmiles.php?id=$id&amp;pass=$pass&amp;start=".($start+10)."\"><br/>".htmlspecialchars(">>>")."</a><br/>";
}
print "<br/><a href=\"index.php?id=$id&amp;pass=$pass\">Смайлы</a>";
ob_end_flush();
?>
</p>
</card>
</wml>
