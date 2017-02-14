<?php
define("FILE_NAM", "text.txt");
$noValue = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['fname']) || empty($_POST['lname'])){
       //global $noValue;
        $noValue = true;
    }
    else {
        $fname = trim(strip_tags($_POST['fname']));
        $lname = trim(strip_tags($_POST['lname']));
        $str = "$fname $lname\n";

        file_put_contents(FILE_NAM, $str, FILE_APPEND);
        header("Location:" . $_SERVER['PHP_SELF']);
        exit();
     }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Работа с файлами</title>
        <meta charset="utf-8">
    </head>
    <body>
        <h1>Заполните форму</h1>
        <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
            Имя: <input type="text" name="fname"><br>
            Фамилия: <input type="text" name="lname"><br>
            <br>
            <input type="submit" value="Отправить"><br>
        </form>
        
        <?php
        if($noValue)
            echo "<p>Не введено имя или фамилия</p>";
        echo "<br>Вывод файла:<br>";
        if(file_exists(FILE_NAM)){
            static $num = 0;
            $arr = file(FILE_NAM);
            foreach($arr as $str){
                $num++;
                echo "$num => $str <br>";
            }
        }else {
            echo "Файла нет!";
        }
        
        ?>
    </body>
</html>