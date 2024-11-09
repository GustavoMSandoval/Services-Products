<?php session_start()?>

<?php 

require_once ('../../backEnd/Model/DataOperations/ClientOperations.php');

$formPath = "Location: ../../frontEnd/View/form/form.html";

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $_SESSION['email'] = $_POST['email'] ;

    if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    try {
    $clientCreation = new ClientOperations();

    $clientCreation -> setImage($_FILES['image']['name']);
    $clientCreation -> setName($_POST['name']);
    $clientCreation -> setEmail( $_POST['email']);
    $clientCreation -> setPassword($_POST['password']);
    $clientCreation -> setPhoneNumber($_POST['phoneNumber']);


    $image_folder = $_FILES['image'];

    move_uploaded_file($image_folder['tmp_name'], '../uploads/'.$image_folder['name']);
    

    $clientCreation -> clientRegister($clientCreation->getImage(),$clientCreation->getName(),$clientCreation->getEmail(),$clientCreation->getPassword(),$clientCreation->getPhoneNumber());

    header("Location: ../../frontEnd/View/dashboard/dashboard.php?email='{$_GET['email']}'");


   } catch(PDOException) {
    header($formPath);
    die();
   } 
   } else {
    header($formPath);
    die();
   }

} else {
    header($formPath);
    die();
}

   