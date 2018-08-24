<?php
//пихаем код в массив
$data[]="<img src=\"smiles/3dsmile.gif\" alt=\".3dsmile.\"/>.3dsmile.";
$data[]="<img src=\"smiles/aga.gif\" alt=\".aga.\"/>.aga.";
$data[]="<img src=\"smiles/angel.gif\" alt=\".angel.\"/>.angel.";
$data[]="<img src=\"smiles/anim.gif\" alt=\".anim.\"/>.anim.";
$data[]="<img src=\"smiles/baksy.gif\" alt=\".baksy.\"/>.baksy.";
$data[]="<img src=\"smiles/beee.gif\" alt=\".beee.\"/>.beee.";
$data[]="<img src=\"smiles/buket.gif\" alt=\".buket.\"/>.buket.";
$data[]="<img src=\"smiles/bum.gif\" alt=\".bum.\"/>.bum.";
$data[]="<img src=\"smiles/butylka2.gif\" alt=\".butylka2.\"/>.butylka2.";
$data[]="<img src=\"smiles/dev.gif\" alt=\".dev.\"/>.dev.";
$data[]="<img src=\"smiles/drink2.gif\" alt=\".drink2.\"/>.drink2.";
$data[]="<img src=\"smiles/em.gif\" alt=\".em.\"/>.em.";
$data[]="<img src=\"smiles/fingal.gif\" alt=\".fingal.\"/>.fingal.";
$data[]="<img src=\"smiles/fingal2.gif\" alt=\".fingal2.\"/>.fingal2.";
$data[]="<img src=\"smiles/focus.gif\" alt=\".focus.\"/>.focus.";
$data[]="<img src=\"smiles/haha.gif\" alt=\".haha.\"/>.haha.";
$data[]="<img src=\"smiles/heart3.gif\" alt=\".heart3.\"/>.heart3.";
$data[]="<img src=\"smiles/icq.gif\" alt=\".icq.\"/>.icq.";
$data[]="<img src=\"smiles/icq2.gif\" alt=\".icq2.\"/>.icq2.";
$data[]="<img src=\"smiles/icq3.gif\" alt=\".icq3.\"/>.icq3.";
$data[]="<img src=\"smiles/icq4.gif\" alt=\".icq4.\"/>.icq4.";
$data[]="<img src=\"smiles/toilet.gif\" alt=\".toilet.\"/> .toilet.";
$data[]="<img src=\"smiles/toy.gif\" alt=\".toy.\"/> .toy.";
$data[]="<img src=\"smiles/toy2.gif\" alt=\".toy2.\"/> .toy2.";
$data[]="<img src=\"smiles/tv.gif\" alt=\".tv.\"/> .tv.";
$data[]="<img src=\"smiles/vantuz.gif\" alt=\".vantuz.\"/> .vantuz.";
$data[]="<img src=\"smiles/heart.gif\" alt=\".heart.\"/> .heart.";
$data[]="<img src=\"smiles/talk.gif\" alt=\".talk.\"/> .talk.";
$data[]="<img src=\"smiles/cvetok.gif\" alt=\".cvetok.\"/> .cvetok.";
$data[]="<img src=\"smiles/loveyou.gif\" alt=\".loveyou.\"/> .loveyou.";
$data[]="<img src=\"smiles/4mok.gif\" alt=\".4mok.\"/> .4mok.";
$data[]="<img src=\"smiles/love.gif\" alt=\".love.\"/> .love.";
$data[]="<img src=\"smiles/smoke.gif\" alt=\".smoke.\"/> .smoke.";
$data[]="<img src=\"smiles/daryu.gif\" alt=\".daryu.\"/> .daryu.";
$data[]="<img src=\"smiles/loving.gif\" alt=\".loving.\"/> .loving.";
$data[]="<img src=\"smiles/stress.gif\" alt=\".stress.\"/> .stress.";
$data[]="<img src=\"smiles/inlove.gif\" alt=\".inlove.\"/> .inlove.";
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
<card title="Чаттеру">
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
print "<a href=\"chsmiles.php?id=$id&amp;pass=$pass&amp;start=".($start-10)."\">".htmlspecialchars("<<<")."</a><br/>";
}
if($count1>$start+10)
{
print "<a href=\"chsmiles.php?id=$id&amp;pass=$pass&amp;start=".($start+10)."\"><br/>".htmlspecialchars(">>>")."</a><br/>";
}
print "<br/><a href=\"index.php?id=$id&amp;pass=$pass\">Смайлы</a>";
ob_end_flush();
?>
</p>
</card>
</wml>
