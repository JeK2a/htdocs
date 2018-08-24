<?php
print '<a href="./room.php?id='.$id.'&amp;pass='.$pass.'&amp;room='.$room.'&amp;r='.$r.'">'.$lang['update'].'</a><br/>'.
'<a href="./room.php?id='.$id.'&amp;pass='.$pass.'&amp;room='.$room.'&amp;mod=privat&amp;r='.$r.'">'.$lang['privat'].'</a><br/>'.
'<a href="#say">'.$lang['say'].'</a><br/>';
$ignor = "";
$qi = @mysql_query("select `user` from `".$px.$itable."` where `loginid`=".$login['id'].";");
while($idata = @mysql_fetch_array($qi)) {
$ignor .= "login != '".$idata['user']."' AND ";
}
//приват или нет
if($room=="vict") {
if($mod=="privat")
$que = @mysql_query("SELECT `login`,`msg`,`time`,`pr_to`,`pr_from` from `".$px.$vtable."` WHERE ".$ignor." (pr_from = '".$login['id']."' OR pr_to = '".$login['id']."') order by id desc limit $num_msgs;");
else
$que = @mysql_query("SELECT `login`,`msg`,`time`,`pr_to`,`pr_from` from `".$px.$vtable."` WHERE ".$ignor." ((pr_to = '' AND pr_from = '') OR (pr_from = '".$login['id']."' OR pr_to = '".$login['id']."')) order by id desc limit $num_msgs;");
} else {
if($mod=="privat")
$que = @mysql_query("SELECT `login`,`msg`,`time`,`pr_to`,`pr_from` from `".$px.$mtable."` WHERE ".$ignor." room = '$room' AND (pr_from = '".$login['id']."' OR pr_to = '".$login['id']."') order by time desc limit $num_msgs;");
else
$que = @mysql_query("SELECT `login`,`msg`,`time`,`pr_to`,`pr_from` from `".$px.$mtable."` WHERE ".$ignor." room = '$room' AND ((pr_to = '' AND pr_from = '') OR (pr_from = '".$login['id']."' OR pr_to = '".$login['id']."')) order by time desc limit $num_msgs;");
}
//выводим все в цикле
while($m = @mysql_fetch_array($que)) {
$dblogin = $m['login'];
$dbmsg = $m['msg'];
$dbtime = ($m['time']);
$pr_to = $m['pr_to'];
$pr_from = $m['pr_from'];
$qdblogin = @mysql_query("select `id` from `".$px.$utable."` where `login`='$dblogin'");
$db = @mysql_fetch_array($qdblogin);
if(!empty($pr_to)&&!empty($pr_from)) print "<b><a href=\"user.php?id=$id&amp;pass=$pass&amp;room=$room&amp;dbid=".$db['id']."&amp;r=$r&amp;mod=$mod\">$dblogin</a>[!]</b>\r[".date("H.i",$dbtime)."]&gt;".$dbmsg."<br/>";
else
print "<b><a href=\"./user.php?id=$id&amp;pass=$pass&amp;room=$room&amp;dbid=".$db['id']."&amp;r=$r\">$dblogin</a></b>\r[".date("H.i",$dbtime)."]&gt;".$dbmsg."<br/>";
}
if($mod=="privat")
print "<a href=\"./history.php?id=$id&amp;pass=$pass&amp;room=$room&amp;start=$num_msgs&amp;&amp;mod=$mod&amp;r=$r\">".$lang['history']."</a>";
else
print "<a href=\"./history.php?id=$id&amp;pass=$pass&amp;room=$room&amp;start=$num_msgs&amp;r=$r\">".$lang['history']."</a>";
print "<br/><a href=\"./enter.php?id=$id&amp;pass=$pass\">".$lang['holl']."</a><br/>";
?>