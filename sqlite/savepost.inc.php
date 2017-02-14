<?php

$name = $gbook->clearData($_POST['name']);
$email = $gbook->clearData($_POST['email']);
$msg = $gbook->clearData($_POST['msg']);

if (!(empty($name) || empty($email) || empty($msg))) {
    if($gbook->savePost($name, $email, $msg))
        header("Location: gbook.php");
    else
        $errMsg = "Произошла ошибка при добавлении сообщения";
} else {
    $errMsg = "Заполните все поля формы!";
}
?>