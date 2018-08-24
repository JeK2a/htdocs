<?php
//посылаем заголовки
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
//начало вывода в браузер страницы
print "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
print '<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN"'.
' "http://www.wapforum.org/DTD/wml_1.1.xml">'.
'<wml><head><meta http-equiv="Cache-Control" content="no-cache" forua="true"/></head>';
//включаем конфигурационный файл
include "./ini.php";
//авторизация
$login = autorize();
print '<card title="Настройки чата">'.
'<p>';
//если пользователь авторизирован
if($login) {
if(empty($action)) {
//выводим страницу в браузер
print 'Количество сообщений на страницу:<br/>'.
'<input name="num_msgs" maxlength="10" value="'.$login['nmsgs'].'" format="*N"/>'.
'<br/>'.
'Время задержки до обновления в мсек (1 сек = 10 мсек):<br/>'.
'<input name="time_update" maxlength="10" value="'.$login['tupdate'].'" format="*N"/>'.
'<br/>'.
'Размер шрифта:<br/>'.
'<select name="fsize" value="'.$login['fsize'].'">'.
'<option value="small">Мелкий</option>'.
'<option value="medium">Нормальный</option>'.
'<option value="big">Большой</option>'.
'</select><br/>'.
'<anchor>Изменить<go href="setup.php?id='.$id.'&amp;pass='.$pass.'" method="post">'.
'<postfield name="action" value="update"/>'.
'<postfield name="time_update" value="$(time_update)"/>'.
'<postfield name="num_msgs" value="$(num_msgs)"/>'.
'<postfield name="fsize" value="$(fsize)"/></go></anchor><br/>';
}
else
{
	if(empty($num_msgs)) $num_msgs = 5;
	if(empty($time_update)) $time_update = 300;
	//Обрабатываем данные
	$num_msgs = htmlspecialchars(intval(substr($num_msgs,0,10)));
	$time_update = htmlspecialchars(intval(substr($time_update,0,10)));
	//посылаем запрос
	$query = @mysql_query("update `".$px.$utable."` set nmsgs='".$num_msgs."', tupdate='".$time_update."', fsize='".$fsize."' where id='".$id."';");
	if($query) print "<b>Настройки для вашего профиля изменены!</b><br/>";
}
print "<a href=\"enter.php?id=$id&amp;pass=$pass\">Прихожая</a>";
} else { print "Ошибка авторизации!"; }
print '</p></card></wml>';
//разрыв соединения с базой
@mysql_close();
ob_end_flush();
?>