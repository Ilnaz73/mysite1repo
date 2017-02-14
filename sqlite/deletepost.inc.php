<?php

$del = $gbook->clearData($_GET['del'], "i");
if(!empty($del)){
    if($gbook->deletePost($del)){
        header("Location: gbook.php");
    }else{
        $errMsg = "Произошла ошибка при удалении сообщения";
    }
}else{
    $errMsg = "Хакер, не ломай мою Гостевую книгу!";
}

?>
