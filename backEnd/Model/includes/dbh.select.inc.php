<?php 

declare(strict_types=1);

require_once('dbh.conn.inc.php');

class SelectDb {

    function selectClient(string $email, string $password) {

        try {
            
        $con = new ConnectionDb();
        $con;

        $query = "SELECT * FROM clientsinfo WHERE client_email = :email AND client_password = :pwd";

        $stmt =  PDO_NEW -> prepare($query);

        $stmt -> bindParam(":email", $email);
        $stmt -> bindParam(":pwd", $password);

        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;

        } catch(Error $e) {

            echo 'Error with select client '.$e->getMessage();

        }       

        return $query;
    }

}