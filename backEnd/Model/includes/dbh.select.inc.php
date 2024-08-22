<?php 

declare(strict_types=1);

class SelectDb {

    function selectClient(string $email, string $password) {

        try {
            
        require_once('../includes/DbHandlers/dbh.conn.inc.php');

        $query = "SELECT * FROM clientsinfo WHERE email = $email AND pwd = $password";

        } catch(SQLite3Exception $e) {

            echo 'Error with select client '.$e;

        }       

        return $query;
    }

}