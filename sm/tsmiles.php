<?php
//кидаем все коды в один массив
$data[]="<img src=\"smiles/pivo.gif\" alt=\".pivo.\"/> .pivo.";
$data[]="<img src=\"smiles/be.gif\" alt=\".be.\"/> .be.";
$data[]="<img src=\"smiles/priv.gif\" alt=\".priv.\"/> .priv.";
$data[]="<img src=\"smiles/susel.gif\" alt=\".susel.\"/> .susel.";
$data[]="<img src=\"smiles/dum.gif\" alt=\".dum.\"/> .dum.";
$data[]="<img src=\"smiles/bumbum.gif\" alt=\".bumbum.\"/> .bumbum.";
$data[]="<img src=\"smiles/love2.gif\" alt=\".love2.\"/>.love2.";
$data[]="<img src=\"smiles/love3.gif\" alt=\".love3.\"/>.love3.";
$data[]="<img src=\"smiles/love4.gif\" alt=\".love4.\"/>.love4.";
$data[]="<img src=\"smiles/love5.gif\" alt=\".love5.\"/>.love5.";
$data[]="<img src=\"smiles/nono.gif\" alt=\".nono.\"/>.nono.";
$data[]="<img src=\"smiles/oops.gif\" alt=\".oops.\"/>.oops.";
$data[]="<img src=\"smiles/pa4ka.gif\" alt=\".pa4ka.\"/>.pa4ka.";
$data[]="<img src=\"smiles/pizza.gif\" alt=\".pizza.\"/>.pizza.";
$data[]="<img src=\"smiles/plak.gif\" alt=\".plak.\"/>.plak.";
$data[]="<img src=\"smiles/plak2.gif\" alt=\".plak2.\"/>.plak2.";
$data[]="<img src=\"smiles/rose2.gif\" alt=\".rose2.\"/>.rose2.";
$data[]="<img src=\"smiles/shok2.gif\" alt=\".shok2.\"/>.shok2.";
$data[]="<img src=\"smiles/skleroz.gif\" alt=\".skleroz.\"/>.skleroz.";
$data[]="<img src=\"smiles/smutil.gif\" alt=\".smutil.\"/>.smutil.";
$data[]="<img src=\"smiles/tog.gif\" alt=\".tog.\"/>.tog.";
$data[]="<img src=\"smiles/tus.gif\" alt=\".tus.\"/>.tus.";
$data[]="<img src=\"smiles/ura.gif\" alt=\".ura.\"/>.ura.";
$data[]="<img src=\"smiles/vau.gif\" alt=\".vau.\"/>.vau.";
$data[]="<img src=\"smiles/vau3.gif\" alt=\".vau3.\"/>.vau3.";
$data[]="<img src=\"smiles/vgubki.gif\" alt=\".vgubki.\"/>.vgubki.";
$data[]="<img src=\"smiles/vino.gif\" alt=\".vino.\"/>.vino.";
$data[]="<img src=\"smiles/vkrasku2.gif\" alt=\".vkrasku2.\"/>.vkrasku2.";
$data[]="<img src=\"smiles/vzglyad.gif\" alt=\".vzglyad.\"/>.vzglyad.";
$data[]="<img src=\"smiles/wink2.gif\" alt=\".wink2.\"/>.wink2.";
$data[]="<img src=\"smiles/woko.gif\" alt=\".woko.\"/>.woko.";
$data[]="<img src=\"smiles/zev.gif\" alt=\".zev.\"/>.zev.";
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
<card title="Тусовщику">
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
print "<a href=\"tsmiles.php?id=$id&amp;pass=$pass&amp;start=".($start-10)."\">".htmlspecialchars("<<<")."</a><br/>";
}
if($count1>$start+10)
{
print "<a href=\"tsmiles.php?id=$id&amp;pass=$pass&amp;start=".($start+10)."\"><br/>".htmlspecialchars(">>>")."</a><br/>";
}
print "<br/><a href=\"index.php?id=$id&amp;pass=$pass\">Смайлы</a>";
ob_end_flush();
?>
</p>
</card>
</wml>
