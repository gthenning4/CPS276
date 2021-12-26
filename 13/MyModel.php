<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}  
class MyModel {
    private static $modelInstance=null;
    public static function getModel(){
        if (self::$modelInstance == null) {
            self::$modelInstance = new MyModel();
        }
        return self::$modelInstance;
    }
    public function getNameFromSession() {
        if (empty($_SESSION['name'])) {
            return '';
        }
        return $_SESSION['name'];
    }
    
    public function getDataFromSession() {
        if (empty($_SESSION['data'])) {
            return [];
        }
        return $_SESSION['data'];
    }
    public function getDataForName($name){
        $args = [];
        $args[] = $name . '%';
        $sql = "SELECT person_name,provider_number,personID FROM a6_people WHERE person_name LIKE ?";
        $data = execute($sql,true,$args);
        $_SESSION['data'] = $data;
        $_SESSION['name'] = $name;
        return $data;
    }
    public function getDataForId($viewid){
        $args[] = $viewid;
        $sql = "SELECT * FROM a6_people WHERE personID = ?";
        $results = execute($sql,true,$args);
        return $results[0];
    }
    public function updateRecord(){
        $sql = "UPDATE a6_people SET person_name = ?,provider_number = ?,locationID = ? WHERE personID = ?";
        $args = [];
        $args[] = $_REQUEST['person_name'];
        $args[] = $_REQUEST['provider_number'];
        $args[] = $_REQUEST['locationID'];
        $args[] = $_REQUEST['editid'];
        execute($sql,false,$args);
    }
    public function deleteRecord($id){
        $args = [];
        $args[] = $id;
        $sql = "DELETE FROM a6_people WHERE personID = ?";
        execute($sql,false,$args);
    }
    //put your code here
}
