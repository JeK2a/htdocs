<?php

echo 'test';
echo '<pre>';
echo __FILE__.' - '.__LINE__."\n";
var_dump($_POST);
var_dump($_FILES);
echo '</pre>';

$uploaddir = getcwd().DIRECTORY_SEPARATOR.'upload'.DIRECTORY_SEPARATOR;
$uploadfile = $uploaddir.basename($_FILES['file']['name']);

move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile);