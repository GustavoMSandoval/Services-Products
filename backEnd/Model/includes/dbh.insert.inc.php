<?php


declare(strict_types=1);

require_once('dbh.conn.inc.php');

class InsertDb {
    
    function insertClient(string $image,string $name,string $email,string $password,string $phoneNumber) {   
        
        try {

            $con = new ConnectionDb();
            $con;

            $query = "INSERT INTO clientsinfo (client_image,client_name,client_email,client_password,client_phoneNumber) VALUES (:img, :name, :email, :pwd, :phoneNum)"; 
            $stmt =  PDO_NEW -> prepare($query);

            $stmt -> bindParam(":img", $image);
            $stmt -> bindParam(":name", $name);
            $stmt -> bindParam(":email", $email);
            $stmt -> bindParam(":pwd", $password);
            $stmt -> bindParam(":phoneNum", $phoneNumber);

            $stmt -> execute();

            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            $stmt = null;
            

            return $result;

        } catch (PDOException $e) {
            echo ' error with connection in insertClient '. $e;
            
        }   
    }


    function insertProduct() {
        try {

            $con = new ConnectionDb();
            $con;

            $query = "INSERT INTO productsinfo (img,name,description,price) VALUES (:img, :name, :description, :price)"; 
            $stmt =  PDO_NEW -> prepare($query);

            $stmt -> bindParam(":img", $image);
            $stmt -> bindParam(":name", $name);
            $stmt -> bindParam(":description", $description);
            $stmt -> bindParam(":price", $price);

            $stmt -> execute();

            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            $stmt = null;
            

            return $result;

        } catch (PDOException $e) {
            echo ' error with connection in insertProduct '. $e;

        }   
    }
}