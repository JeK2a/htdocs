<?php
//заголовок
header ("Content-type:text/vnd.wap.wml; charset=utf-8");
print '<?xml version="1.0" encoding="utf-8"?>'.
'<!DOCTYPE wml PUBLIC "-//WAPFORUM//DTD WML 1.1//EN"'.
' "http://www.wapforum.org/DTD/wml_1.1.xml">'.
'<wml><head><meta http-equiv="Cache-Control" content="no-cache" forua="true"/></head>';
//включаем файл конфигурации
include "./ini.php";
//обрабатываем полученные данные
$login=htmlspecialchars(stripslashes(trim($login)));
$login=substr($login,0,20);
$pass=htmlspecialchars(stripslashes(trim($pass)));
$name=htmlspecialchars(stripslashes(trim($name)));
$live=htmlspecialchars(stripslashes(trim($live)));
$sex=htmlspecialchars(stripslashes(trim($sex)));
$mobile=htmlspecialchars(stripslashes(trim($mobile)));
$about=htmlspecialchars(stripslashes(trim($about)));
$email=htmlspecialchars(stripslashes(trim($email)));
$wapurl=htmlspecialchars(stripslashes(trim($wapurl)));
$weburl=htmlspecialchars(stripslashes(trim($weburl)));
$icq=htmlspecialchars(stripslashes(trim($icq)));
$operator=htmlspecialchars(stripslashes(trim($operator)));
//вывод страницы в браузер
print '<card title="Регистрация">'.
'<p align="left">';
//запрос в базу данных
$query_users_login = @mysql_query("select * from `".$px.$utable."` where login='".$login."';");
$users_login = @mysql_fetch_array($query_users_login);
///проверяем нужные поля, записываем ошибки в переменную
if(empty($login)) $error='Не введен логин!<br/>';
if(empty($pass)) $error=$error.'Не введен пароль!<br/>';
if(empty($name)) $error=$error.'Не введено имя!<br/>';
if(empty($sex)) $error=$error.'Не выбран пол!<br/>';
if(preg_match("/[^\da-zA-Z-@#!_]+/",$login)) $error.='В логине обнаружены недопустимые символы! Логин должен быть на латинице!<br/>';
if(preg_match("/[^\da-zA-Z_]+/",$pass)) $error.='Недопустимые символы в пароле! Пароль должен быть на латинице!<br/>';
///////////////////////////////////
$db_login = $users_login['login'];
//если ошибок нет
if(empty($error))
{//если логин и пароль пусты
	//если введенный логин не равен логину в базе, то:
	if(strtolower($login) != strtolower($db_login))
	{
	//запрос на регистрацию пользователя
	@mysql_query("insert into `".$px.$utable."` values(0,'$login','$pass','$name','$sex','$bday','$bmonth','$byear','','$live','$mobile','$operator','$email','$wapurl','$weburl','$icq','$about','Прохожий',0,0,'','','','','','',0,0,0,'".time()."','".time()."','".getenv(REMOTE_ADDR)."','".getenv(HTTP_USER_AGENT)."');");
	print $login.", спасибо за регистрацию! Тебе здесь обязательно понравится! :)<br/>";
	print '<anchor>Вход<go href="enter.php" method="post">
	<postfield name="login" value="$(login)"/>
	<postfield name="pass" value="$(pass)"/>
	</go>
	</anchor>';
	}
	else
	{
	print 'К сожалению такой пользователь уже зарегистрирован!';
	}
}
else
{//выводим ошибки
	print $error;
}
print '</p></card></wml>';
//разрываем соединение с бд
@mysql_close();
?>