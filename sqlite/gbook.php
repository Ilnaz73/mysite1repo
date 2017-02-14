<?php
include "GbookDB.class.php";

$gbook = new GbookDB();
$errMsg = "";

if($_SERVER['REQUEST_METHOD'] == "POST"){
    include "savepost.inc.php";
}

if(isset($_GET['del']))
    include 'deletepost.inc.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Гостевая книга</title>
	<meta charset="utf-8">
</head>
<body>

<h1>Гостевая книга</h1>
<?php
if($errMsg != "")
    echo $errMsg;
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

Ваше имя:<br>
<input type="text" name="name"><br>
Ваш e-mail:<br>
<input type="text" name="email"><br>
Сообщение:<br />
<textarea name="msg" cols="50" rows="5"></textarea><br>
<br>
<input type="submit" value="Добавить!">

</form>

<?php
include 'getall.inc.php';
?>

</body>
</html>