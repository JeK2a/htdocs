<?php
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
print '<?xml version="1.0" encoding="utf-8"?>';
print '<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN" "http://www.wapforum.org/DTD/wml_1.1.xml">'.
'<wml><head><meta http-equiv="Cache-Control" content="no-cache" forua="true"/></head>';
//����砥� 䠩� ���䨣��樨
include "./ini.php";
print '<card title="'.$lang['holl'].'">'.
'<p align="center">';
//�᫨ �� ��।�� �����, 㧭��� �� �� ����
if(!empty($login))
$q = @mysql_query("select `id` from `".$px.$utable."` where `login`='".$login."';");
if(empty($id)) {
//����� � ���ᨢ
$data = @mysql_fetch_array($q);
//�� ���짮��⥫�
$id = $data['id']; 
}
//���ਧ���
$login = autorize();
if($login) {
	if(!$login['ip']) { @mysql_query("update `".$px.$utable."` set `ip`='".getenv(REMOTE_ADDR)."' where `id`='".$id."';"); }
	if(!$login['soft']) { @mysql_query("update `".$px.$utable."` set `soft`='".getenv(HTTP_USER_AGENT)."' where `id`='".$id."';"); }
	//��⠭�������� ࠧ��� ����
	if($login['fsize'] == "small") { $fsize1 = "<small>"; $fsize2 = "</small>"; }
	elseif($login['fsize'] == "big") { $fsize1 = "<big>"; $fsize2 = "</big>"; }
	else { $fsize1 = ""; $fsize2 = ""; }
	print $fsize1;
	ustatus();	//������塞 ������
	@mysql_query("update `".$px.$utable."` set `ltime`='".time()."', `room`='$room' where `id`='".$id."';");
	$q_letters_in = @mysql_query("select count(*) from `".$px.$ltable."` where `to_user`='".$login['login']."' and `new`=1;");
	$num_in=@mysql_fetch_array($q_letters_in);	//㧭��� ������⢮ �室��� ����� ��ᥬ
	$q_letters_in_all = @mysql_query("select count(*) from `".$px.$ltable."` where `to_user`='".$login['login']."'");
	$num_in_all=@mysql_fetch_array($q_letters_in_all);	//㧭��� ������⢮ �室��� ��ᥬ
	//�᫨ ���짮��⥫� �����
	if($login['admin']) print "<a href=\"./admin.php?id=$id&amp;pass=$pass\">".$lang['admining']."</a><br/>$divide";
	//�᫨ ���짮��⥫� �����
	if($login['moder']) print "<a href=\"./moder.php?id=$id&amp;pass=$pass\">".$lang['modering']."</a><br/>$divide";
	///////////////////////////////////////////////////////
	$q_num_meets = @mysql_query("select count(*) from `".$px.$meettable."` where 1");
	$num_meets=@mysql_fetch_array($q_num_meets);	//㧭��� ������⢮ �����
	//print '<b><a href="new.php?id='.$id.'&amp;pass='.$pass.'">'.$lang['marryed'].'</a></b><br/>';
	print '<a href="./letters/index.php?id='.$id.'&amp;pass='.$pass.'">'.$lang['letters'].'('.$num_in['count(*)'].'/'.$num_in_all['count(*)'].')</a><br/>'.
	'<a href="./meets.php?id='.$id.'&amp;pass='.$pass.'">'.$lang['meets'].'('.$num_meets['count(*)'].')</a><br/>'.
	'<a href="./search.php?id='.$id.'&amp;pass='.$pass.'">'.$lang['search'].'</a><br/>'.
	'<a href="./online.php?id='.$id.'&amp;pass='.$pass.'">'.$lang['who_online'].'</a><br/>'.
	$divide;
	//��� �뢮�� ��뫮� �� �������
	$q = @mysql_query("select `var`,`val1` from `".$px.$stable."` where `mod`='room' order by val3;");
	//� 横�� ���⠥� ��뫪�
	while($droom = @mysql_fetch_array($q)) {
		$q_count = @mysql_query("SELECT count(*) FROM `".$px.$utable."` WHERE `ltime`>'".intval(time()-$offline)."' AND `room`='".$droom['var']."';");
		$dcount = @mysql_fetch_array($q_count);
		print '<a href="room.php?id='.$id.'&amp;pass='.$pass.'&amp;room='.$droom['var'].'">'.$droom['val1'].'('.$dcount['count(*)'].')</a><br/>';
	}
	print $divide.
	'<a href="./statistic.php?id='.$id.'&amp;pass='.$pass.'">'.$lang['stats'].'</a><br/>'.
	'<a href="./help.php?id='.$id.'&amp;pass='.$pass.'">'.$lang['help'].'</a><br/>'.
	'<a href="./ignor.php?id='.$id.'&amp;pass='.$pass.'">'.$lang['ignor'].'</a><br/>'.
	'<a href="./setup.php?id=$id&amp;id='.$id.'&amp;pass='.$pass.'">'.$lang['settings'].'</a><br/>'.
	'<a href="./profile.php?id='.$id.'&amp;pass='.$pass.'">'.$lang['profile'].'</a><br/>'.
	$divide.
	'<a href="/">'.$lang['main'].'</a>';
	//����� �� ������⢮ ������ � ��宦��
	$pr_count = @mysql_query("SELECT count(*) FROM `".$px.$utable."` WHERE ltime>'".intval(time()-$offline)."' AND room='';");	
	//��堥� � ���ᨢ
	$pdc = @mysql_fetch_array($pr_count);
	//�뢮��� � ��㧥�
	print '<br/>'.$lang['people_in_holl'].': '.$pdc['count(*)'].'<br/>';
	print $fsize2;
} else { print $lang['not_loged']; }
print '</p>'.
'</card>'.
'</wml>';
@mysql_close();
?>
