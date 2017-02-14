<?php
$arr = $gbook->getAll();
if(empty($arr)){
    $errMsg = "Произошла ошибка при выводе записей";
}else{        
echo '<p>Всего записей:' . count($arr) . ' </p>';
foreach ($arr as $user){
    $id = $user['id'];
    $name = $user['name'];
    $email = $user['email'];
    $msg = nl2br($user['msg']);
    $dt = date("d-m-Y H:i:s", (int) $user['datetime']);
    $ip = $user['ip'];
    echo <<<END
    <hr>
    <p><a href="mailto:$email">$name</a> from [$ip] @ $dt
            <br>$msg</p>
    <p align="right"><a href="gbook.php?del=$id">Удалить</a></p>
END;
}
}

/* ЗАДАНИЕ 2
- После вызова метода getAll проверьте, был ли запрос успешным?
- Если НЕТ, то присвойте переменной $errMsg строковое значение "Произошла ошибка при выводе записей"
*/
?>