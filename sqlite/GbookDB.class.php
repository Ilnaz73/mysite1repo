<?php

include "IGbookDB.class.php";

class GbookDB implements IGbookDB {
    const DB_NAME = "gbook.db";
    private $_db;
    public function __construct() {
        if(!file_exists(self::DB_NAME)){
        $this->_db = new SQLite3(self::DB_NAME);
        $sql = "CREATE TABLE msgs(
                id INTEGER PRIMARY KEY,
                name TEXT,
                email TEXT,
                msg TEXT,
                datetime INTEGER,
                ip TEXT
                )";
        $this->_db->query($sql);
        }else{
            $this->_db = new SQLite3(self::DB_NAME);
        }
    }
    public function __destruct() {
        unset($this->_db);
    }

    function savePost($name, $email, $msg){
        $ip = $_SERVER["REMOTE_ADDR"];
        $dt = time();
        $sql = "INSERT INTO msgs(name, email, msg, datetime, ip) "
                . "VALUES('$name','$email','$msg', $dt, '$ip')";
        
        if($this->_db->query($sql))
            return true;
        else{
            try{
                throw new SQLiteException($this->_db->lastErrorMsg());
            } catch (Exception $ex) {
                 return false;
            }
        }
    }
    
    function getAll(){
        $sql= "SELECT id, name, email, msg, ip, datetime FROM msgs "
                . "ORDER BY id DESC";
        $result = $this->_db->query($sql);
        while($arr[] = $result->fetchArray(SQLITE3_ASSOC)){}
        array_pop($arr);
        return $arr;
    }

    function deletePost($id){
        $sql = "DELETE from msgs WHERE id='" . $id . "'";
        if($this->_db->query($sql))
            return true;
        else 
            return false;
        
    }
    
    function clearData($str, $type="s"){
    switch ($type){
        case "s": trim(strip_tags($str)); break;
        case "i": abs((int) $str); break;
    }
    return $str;
}
}

$gbook = new GbookDB();


/*
  ЗАДАНИЕ 6 (Если останется время)
  - Опишите в конструкторе, а также в методах getAll, savePost и deletePost блок try-catch
  - Создайте исключения на ошибки при выполнении SQL-запросов
 */
?>