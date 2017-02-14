<?php
class SuperUser extends User implements ISuperUser{
    public $role="";
    public static $supcount = 0;
    public $objNum;
    function __construct($name, $login, $password,$role) {
        parent::__construct($name, $login, $password);
        parent::$count--;
        $this->objNum = ++self::$supcount;
        $this->role = $role;
    }
    
    public function showInfo(){
        parent::showInfo();
        echo "<p>Пароль: $this->role</p>";
    }
    function getInfo() {
        $arr = [];
        foreach($this as $n=>$v){
            $arr[$n] = $v;
        }
        return $arr;
    }
    function __toString(){
        return "<br>Объект #{$this->objNum} : {$this->name}";
    }
}
?>
