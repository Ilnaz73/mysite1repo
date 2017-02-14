<?php
define("USERS_XML", "users.xml");

function clearData($str, $type = "s") {
    switch ($type) {
        case "s": trim(strip_tags($str));
            break;
        case "i": abs((int) $str);
            break;
    }
    return $str;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = clearData($_POST['name']);
    $email = clearData($_POST['email']);
    $msg = clearData($_POST['msg']);
    $ip = $_SERVER['REMOTE_ADDR'];
    $dt = time();

    $dom = new DOMDocument("1.0", "utf-8");
    $dom->formatOutput = true;
    $dom->preserveWhiteSpace = false;
    if (file_exists(USERS_XML)) {
        $dom->load(USERS_XML);
        $root = $dom->documentElement;
    } else {
        $root = $dom->createElement("users");
        $dom->appendChild($root);
    }
    echo $name, $email, $msg;
    $n = $dom->createElement("name", $name);
    $e = $dom->createElement("email", $email);
    $m = $dom->createElement("msg", $msg);
    $i = $dom->createElement("ip", $ip);
    $d = $dom->createElement("datetime", $dt);
    $user = $dom->createElement("user");
    $user->appendChild($n);
    $user->appendChild($e);
    $user->appendChild($m);
    $user->appendChild($i);
    $user->appendChild($d);
    $root->appendChild($user);
    $dom->save(USERS_XML);
    header("Location: gbook.php");
    exit;
}
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Гостевая книга</title>
        <meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
    </head>
    <body>

        <h1>Гостевая книга</h1>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

            Ваше имя:<br>
            <input type="text" name="name"><br>
            Ваш E-mail:<br>
            <input type="text" name="email"><br>
            Сообщение:<br>
            <textarea name="msg" cols="50" rows="5"></textarea><br>
            <br>
            <input type="submit" value="Добавить!">

        </form>

<?php
$sxml = simplexml_load_file(USERS_XML);
for($i = count($sxml)-1; $i >= 0; $i--){   
    echo $sxml->user[$i]->name . " " . $sxml->user[$i]->email . " " 
            . $sxml->user[$i]->msg . " " . $sxml->user[$i]->ip . " " 
            . $sxml->user[$i]->datetime . "<br>";
}
/*
  ЗАДАНИЕ 4
  - Создайте объект SimpleXML и загрузите в него XML-документ
  - Выведите в браузер все сообщения, а также информацию
  об авторе каждого сообщения в произвольной форме
  в обратном порядке
 */
?>

    </body>
</html>