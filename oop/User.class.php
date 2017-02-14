<?php

class User extends AUser{
    public $name;
    public $login;
    public $password;
    public static $count = 0;
    public $objNum;
    const INFO_TITLE = "Данные пользователя: ";
    
    function __construct($name="", $login="", $password="") {
        $this->objNum = ++self::$count;
        try{
            if($name=="")
                throw new nameExc("Введите");
            $this->name = $name;
            if($login=="")
                throw new loginExc("Введите");
            $this->login = $login;
            if($password=="")
                throw new passExc("Введите");
            $this->password = $password;
        }catch (nameExc $e){
            echo $e->getMessage();    
        }catch (loginExc $e){
            echo $e->getMessage();    
        }catch (passExc $e){
            echo $e->getMessage();    
        }catch (Exception $e){
            echo $e->getMessage();    
        }
    }
    function __destruct() {
        //echo 'Object deleted! ';
    }
    function __clone(){
        self::$count++;
        $this->name = "Guest";
        $this->login = "guest";
        $this->password = "qwerty";
    }
    function __toString(){
        return "<br>Объект #{$this->objNum} : {$this->name}";
    }
    
    public function showInfo(){
        echo "<br>";
        echo "<p>Имя: $this->name</p>";
        echo "<p>Логин: $this->login<p>";
        echo "<p>Пароль: $this->password</p>";
    }
    
    public function showTitle(){
        echo self::INFO_TITLE;
    }
}
?>