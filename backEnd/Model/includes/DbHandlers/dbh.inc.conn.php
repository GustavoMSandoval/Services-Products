<?php 

declare(strict_types=1);

class Connection {

    public function __construct() {
        
        $dbPort = "3307";
        $dbName = "services";

        $dsn = "mysql:host=localhost:".$dbPort.";dbname=".$dbName."";
        $dbUser = "root";
        $dbPwd = "";

    try {
        
        $pdo  = new PDO($dsn, $dbUser,$dbPwd);
        $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "error of type $e";
    }
    }
   
    
}