<?php
//посылаем заголовки
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
//вывод в браузер
print "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
print '<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN"'.
' "http://www.wapforum.org/DTD/wml_1.1.xml">'.
'<wml><head><meta http-equiv="Cache-Control" content="no-cache" forua="true"/></head>';
//включаем конфигурационный файл
include "./ini.php";
//авторизация
$login = autorize();
//продолжаем вывод в браузер
print '<card title="Профиль">'.
'<p align="center">';
//если пуст ид пользователя
if(empty($id))
print "Логин пуст!<br/>";
if($login) {
if(empty($action)) {
print 'Имя:<br/>'.
'<input type="text" name="name" value="'.$login['name'].'"/><br/>'.
'Новый пароль:<br/>'.
'<input type="text" name="newpass" value="'.$login['pass'].'"/><br/>'.
'Пол:<br/>'.
'<select name="sex" title="Пол" value="'.$login['sex'].'">'.
'<option value="m">М</option>'.
'<option value="zh">Ж</option></select><br/>'.
'Дата рождения:<br/>'.
'<input size="2" name="bday" maxlength="2" value="'.$login['bday'].'" format="*N"/>-<input size="2" name="bmonth" maxlength="2" value="'.$login['bmonth'].'" format="*N"/>-<input size="4" name="byear" maxlength="4" value="'.$login['byear'].'" format="*N"/><br/>'.
'Место жительства:<br/>'.
'<input type="text" name="live" value="'.$login['live'].'"/><br/>'.
'Модель мобилы:<br/>'.
'<input type="text" name="mobile" value="'.$login['mobile'].'"/><br/>'.
'e-mail:<br/>'.
'<input type="text" name="email" value="'.$login['email'].'"/><br/>'.
'WAP-сайт:<br/>'.
'<input type="text" name="wapurl" value="'.$login['wapsite'].'"/><br/>'.
'WEB-сайт:<br/>'.
'<input type="text" name="weburl" value="'.$login['website'].'"/><br/>'.
'ICQ:<br/>'.
'<input name="icq" value="'.$login['icq'].'" format="*N"/><br/>'.
'О себе:<br/>'.
'<input type="text" name="about" value="'.$login['about'].'"/><br/>'.
'<anchor>Изменить<go href="profile.php?id='.$id.'&amp;pass='.$pass.'" method="post">'.
'<postfield name="action" value="edit"/>'.
'<postfield name="name" value="$(name)"/>'.
'<postfield name="newpass" value="$(newpass)"/>'.
'<postfield name="sex" value="$(sex)"/>'.
'<postfield name="bday" value="$(bday)"/>'.
'<postfield name="bmonth" value="$(bmonth)"/>'.
'<postfield name="byear" value="$(byear)"/>'.
'<postfield name="live" value="$(live)"/>'.
'<postfield name="mobile" value="$(mobile)"/>'.
'<postfield name="email" value="$(email)"/>'.
'<postfield name="wapurl" value="$(wapurl)"/>'.
'<postfield name="weburl" value="$(weburl)"/>'.
'<postfield name="icq" value="$(icq)"/>'.
'<postfield name="about" value="$(about)"/></go></anchor><br/>';
//иначе
}
else
{
//запрос в базу данных
if(@mysql_query("update `".$px.$utable."` set name='$name',pass='$newpass',sex='$sex',bday='$bday',bmonth='$bmonth',byear='$byear',live='$live',mobile='$mobile',email='$email',wapsite='$wapurl',website='$weburl',icq='$icq',about='$about'  where id='$id';"))
print "<b>Ваш профиль изменен!</b><br/>";
//ссылка на прихожую
print "<a href=\"enter.php?id=$id&amp;pass=$newpass\">Прихожая</a>";
}
if(!$action)
print "<anchor>Назад<prev/></anchor><br/>";
} else { print "Ошибка авторизации!"; }
//конец страницы
print '</p>'.
'</card>'.
'</wml>';
//разрыв соединения с бд
@mysql_close();
?>
