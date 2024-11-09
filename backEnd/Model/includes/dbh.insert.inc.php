<?php


declare(strict_types=1);

require_once('dbh.conn.inc.php');

class InsertDb {
    
    function insertClientDB(string $image,string $name,string $email,string $password,string $phoneNumber) {   
        
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


    function insertProductDB($email, $image, $name, $description, $price) {

        
        $conn = mysqli_connect("localhost:3307","root","","servicesdb");
        
        $emailSelect = mysqli_real_escape_string($conn, $email);

        $selectID = "SELECT client_id FROM clientsinfo WHERE client_email = '{$emailSelect}' ";

        $result = mysqli_query($conn, $selectID);
        while ($row = mysqli_fetch_assoc($result)) {
            $id_client = $row["client_id"];
        }

    if(!empty($id_client)) {
        try {

            $con = new ConnectionDb();
            $con;

            $query = "INSERT INTO productsinfo (client_product_id, product_image,product_name,product_description,product_price) VALUES ( :id,:img, :name, :description, :price)"; 
            $stmt =  PDO_NEW -> prepare($query);

            $stmt -> bindParam(":id" , $id_client);
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
}
