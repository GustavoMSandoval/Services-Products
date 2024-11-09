<?php 

require_once ('../../backEnd/Model/DataOperations/ClientOperations.php');

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    session_start();

    if (isset($_POST['email']) && isset($_POST['password'])) {

    $_SESSION['email'] = $_POST['email'] ;

        try {

        $clientValidation = new ClientOperations();
        $clientValidation->setEmail($_POST['email']);
        $clientValidation->setPassword($_POST['password']);

        $clientValidation->clientLogin($clientValidation->getEmail(),$clientValidation->getPassword());

        } catch(Exception $e) {
            echo "<p>Error with client login </p>" .  $e-> getMessage();
        }
    }

} else {
    header("Location: ../../frontEnd/View/form/form.html");
    die();
}