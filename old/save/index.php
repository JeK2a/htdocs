<!--<!--<form enctype="multipart/form-data" action="https://my.tdfort.ru/launchers/post_to_send_mail.php" method="POST">-->-->
<!--<form enctype="multipart/form-data" action="inbox.php" method="POST">-->
<!--<!--<form enctype="multipart/form-data" action="inbox.php" method="POST">-->-->
<!--    <input type="hidden" name="MAX_FILE_SIZE" value="3000000" />-->
<!--    <!-- Название элемента input определяет имя в массиве $_FILES -->-->
<!--    Отправить этот файл: <input name="userfile" type="file" />-->
<!--    <input type="submit" value="Send File" />-->
<!--</form>-->

<HTML>
<HEAD>
    <TITLE>Отправка сообщения с вложением</TITLE>
    <meta charset="utf-8">
</HEAD>
<BODY>
<H3>Отправка сообщения с вложением</H3>
<div>
    <table width="1" border="0">
        <form action="https://my.tdfort.ru/launchers/post_to_send_mail.php" enctype="multipart/form-data" method="post">
            <input type="hidden" name="action" value="import_1c_send_mail">
            <input type="hidden" name="type" value="html">
            <tr><td width="50%">To:</td><td align="right"><input type="text" name="mail_to" maxlength="32"></td></tr>
            <tr><td width="50%">Subject:</td><td align="right"><input type="text" name="subject" maxlength="250"></td></tr>
            <tr><td colspan="2">Message:<br><textarea cols="50" rows="8" name="message"></textarea></td>
            <tr><td width="50%">File:</td><td align="right"><input type="file" name="userfile" maxlength="64"></td></tr>
            </tr><tr><td colspan="2"><input type="submit" value="Send"></td></tr>
        </form>
    </table>
</div>
</BODY>
</HTML>

<?php


$json =  file_get_contents('test.json');

echo '<pre>';
echo __FILE__.' - '.__LINE__."\n";
print_r(json_decode($json, true));
echo '</pre>';


//$url = 'https://my.tdfort.ru/launchers/post_to_send_mail.php';

//$vars = http_build_query($paramsArray);
//
//$options = array(
//    'http' => array(
//        'method'  => 'POST',
//        'header'  => 'Content-type: application/x-www-form-urlencoded',  // заголовок
//        'content' => $vars,
//    )
//);
//
//$context  = stream_context_create($options);  // создаём контекст потока
//
//$result = file_get_contents($url, false, $context);
//
//echo "\n Ответ на запрос 1: " . $result;
//
//
//$myCurl = curl_init();
//
//curl_setopt_array($myCurl, array(
//    CURLOPT_URL => $url,
//    CURLOPT_RETURNTRANSFER => true,
//    CURLOPT_POST => true,
//    CURLOPT_POSTFIELDS => http_build_query($paramsArray)
//));
//
//$response = curl_exec($myCurl);
//curl_close($myCurl);
//
//echo "\n Ответ на запрос 2: " . $response;

//$uploaddir = '/var/www/uploads/';
//$uploadfile = $uploaddir . basename($_FILES['userfile']['name']);
////$uploadfile = $_FILES['userfile']['name'];
//
//$file = basename($_FILES['userfile']['name']);
//
//$fileRead = fopen($file, "r"); // открываем файл
//$contentFile = fread($fileRead, filesize($file)); // считываем его до конца
//$file_size = filesize($file);
//fclose($fileRead); // закрываем файл
//
//echo $contentFile;
//
//echo '<pre>';
//if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
////if (is_uploaded_file($_FILES['userfile']['tmp_name'])) {
//    echo "Файл корректен и был успешно загружен.\n";
//} else {
//    echo "Возможная атака с помощью файловой загрузки!\n";
//}
//
//echo 'Некоторая отладочная информация:';
//print_r($_FILES);
//
//print "</pre>";

//$path = "https://tdfort.ru/files/email/33/89.jpg";
//$path = "https://tdfort.ru/files/email/33/89.jpg";
//$path = "inbox.php";
//$path = "https://tdfort.ru/files/email/33/facebook.jpg";

//if (!@is_file($path)) {
//    $this->setError($this->lang('file_access') . $path);
//    return false;
//    echo "Не файл";
//} else {
//    echo "Файл";
//}