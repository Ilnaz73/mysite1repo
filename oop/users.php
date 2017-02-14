<?php
class nameExc extends Exception{
    function __construct($message) {
        $message .= " name!";
        parent::__construct($message);
        
    }
}
class loginExc extends Exception{
    function __construct($message) {
        $message .= " login!";
        parent::__construct($message);
        
    }
}
class passExc extends Exception{
    function __construct($message) {
        $message .= " password!";
        parent::__construct($message);
        
    }
}

function __autoload($name){
    include "$name.class.php";
}

function checkObject($obj){
    if ($obj instanceof SuperUser){
        echo "<br>Пользователь  имеет права администратора";
    }elseif ($obj instanceof User) {
        echo "<br>Пользователь имеет права обычного пользователя";
    }else{
        echo"<br>Пользователь неизвестен";
    }
}

$myUser1 = new User("Mall", "mall", "ffff");
    $myUser1->showTitle();
    $myUser1->showInfo();
$myUser2 = new User("Fall", "fall", "ffff");
    $myUser2->showInfo();
$myUser3 = new User("Xall", "xall");
    $myUser3->showInfo();
$myUser4 = clone $myUser3;
    $myUser4->showInfo();
$supUser1 = new SuperUser("Admin", "admin", "dddd", 'admin');
    $supUser1->showInfo();
    $sups = $supUser1->getInfo();
    foreach ($sups as $name=>$value){
        echo "<br>$name: $value";
    }
    echo "<br>" . User::$count;
    echo "<br>" . SuperUser::$supcount;
    checkObject($myUser3);
    checkObject($myUser4);
    checkObject($supUser1);
    echo $myUser1;
    echo $myUser3;
    echo $supUser1;

?>