<?php session_start()?>
<?php 

require_once('../../backEnd/Model/DataOperations/ProductOperations.php');

if($_SERVER["REQUEST_METHOD"] === 'POST') {
        if(!empty($_GET["email"]) && !empty($_FILES["product_image"]["name"]) && !empty($_POST["product_name"]) && !empty($_POST["product_description"]) && !empty($_POST["product_price"])) {

            $email = $_SESSION['email'];

            $productRegister = new ProductOperations();
            $productRegister -> setImage($_FILES['product_image']['name']);
            $productRegister -> setName($_POST['product_name']);
            $productRegister -> setDescription($_POST['product_description']);
            $productRegister -> setPrice(floatval($_POST['product_price']));

            $image_folder = $_FILES['product_image'];

            move_uploaded_file($image_folder['tmp_name'], '../uploads/'.$image_folder['name']);

            $productRegister->productRegister($email, $productRegister -> getImage(), $productRegister -> getName(),$productRegister -> getDescription(), $productRegister -> getPrice());
            header("Location: ../../frontEnd/View/myProducts/myProducts.php?email={$_SESSION['email']}");

        } else { 
            header("Location: ../../frontEnd/View/myProducts/myProducts.php?email={$_SESSION['email']}");
        }
}
