<?php 

declare(strict_types=1);

require_once ('../../backEnd/Model/DataOperations/ClientOperations.php');

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    if($_POST['name'] !== "") {
    try {
    $clientCreation = new ClientOperations();

    $clientCreation -> setImage($_FILES['image']['name']);
    $clientCreation -> setName($_POST['name']);
    $clientCreation -> setEmail( $_POST['email']);
    $clientCreation -> setPassword($_POST['password']);
    $clientCreation -> setPhoneNumber($_POST['phoneNumber']);


    $clientCreation -> clientRegister($clientCreation->getImage(),$clientCreation->getName(),$clientCreation->getEmail(),$clientCreation->getPassword(),$clientCreation->getPhoneNumber());

    header("Location: ../../frontEnd/View/dashboard.php");


   } catch(PDOException) {
    header("Location: ../../frontEnd/View/form.html");
    die();
   } 
   } else {
    header("Location: ../../frontEnd/View/form.html");
    die();
   }

} else {
    header("Location: ../../frontEnd/View/form.html");
    die();
}

   