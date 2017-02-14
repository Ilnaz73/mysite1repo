<?php

// Сокетное соединение
// Создание сокета (host+порт)
$s = fsockopen("mysite", 80, $errno, $errstr, 30);

// Создание POST-строки
$str = "name=John&age=25";
// Посылка HTTP-запроса
$out = "POST /socket/dummy.php HTTP/1.1\r\n"
        . "HOST: mysite\r\n"
        . "Content-Type: application/x-www-form-urlencoded\r\n"
        . "Content-Length: " . strlen($str) . "\r\n$str\r\n";
fwrite($s, $out);
// Получение и вывод ответа
while (!feof($s)) {
    echo fgets($s, 4096);
}
fclose($s);
// Закрытие соединения
?>