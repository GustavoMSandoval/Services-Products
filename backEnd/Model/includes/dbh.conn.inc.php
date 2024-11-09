<?php 

class ConnectionDb {

    public function __construct() {
       

        $dbPort = "3307";
        $dbName = "servicesdb";

        $dsn = "mysql:host=localhost:".$dbPort.";dbname=".$dbName."";
        $dbUser = "root";
        $dbPwd = "";

    try {
        
        
        define('PDO_NEW', new PDO($dsn, $dbUser,$dbPwd));
        PDO_NEW-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    } catch (PDOException $e) {
        echo "error of type $e";
    }

    
    }
   
    
}