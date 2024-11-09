<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

    <main>
        <div class="main-left">
        <a href="../dashboard/dashboard.php?email=<?=$_SESSION['email']?>" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true">ALL products</a>
        </div>
        <div class="main-top">
            <h2>Register your products</h2>
            <form enctype="multipart/form-data" action="../../../backEnd/Controller/product.controller.php?email=<?=$_SESSION['email']?>" method="post">
                <label for="product_image"><img src="https://img.icons8.com/?size=100&id=53386&format=png&color=000000" alt=""></label>
                <input type="file" name="product_image" id="product_image">
                <label for="">Product name</label>
                <input type="text" name="product_name" id="product_name">
                <label for="">Product description</label>
                <input type="text" name="product_description" id="product_description">
                <label for="">Product price</label>
                <input type="number" name="product_price" id="product_price" min="0" max="100000" step="0.01">
                
                <input type="submit" value="submit">
            </form>
        </div>
        
        <div class="main-bottom">
            <h2>Your products</h2>
        <div class="main-bottom-products">
            <?php

            $email = $_SESSION['email'];
            
            $conn = mysqli_connect("localhost:3307","root","","servicesdb");
            
            $email = mysqli_real_escape_string($conn, $_GET["email"]);
            $sql = "SELECT p.*, c.client_id, c.client_email   FROM productsinfo p , clientsinfo c WHERE '$email' = c.client_email AND p.client_product_id = c.client_id";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {?>
            
            <div class="card" style="width: 15rem;">            
            <img src="../../../backEnd/uploads/<?= $row['product_image']?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $row['product_name']?></h5>
                <p class="card-text"><?=$row['product_description']?></p>
                <a href="#" class="btn btn-inside">Go somewhere</a>
            </div>
            </div>
                <?php
                }
            }
            ?>
        </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>