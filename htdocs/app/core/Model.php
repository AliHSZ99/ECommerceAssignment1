<?php
namespace app\core;

class Model{

    protected static $connection = null;

    public function __construct() {
        $username = 'root';
        $password = '';
        $host = 'localhost';//where we find the MySQL DB server
        $DBname = 'investigating_company'; //the DB name for your Web application


        //connect the objects to the storage medium
        if(self::$connection == null) {
            self::$connection = new \PDO("mysql:host=$host;dbname=$DBname",$username,$password);
        }
    }

}

?>