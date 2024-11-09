<?php session_start()?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../global.css">
</head>
<body>


<main>
    <div class="main-left">
            <a href="../myProducts/myProducts.php?email=<?=$_SESSION['email']?>" class="btn btn-secondary btn-lg active" role="button" aria-pressed="true"> MY products</a>
    </div>
    <div class="main-right">
    <?php
    
            $conn = mysqli_connect("localhost:3307","root","","servicesdb");
    
    
            $sql = "SELECT * FROM productsinfo";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);
            if($resultCheck > 0) {
                while ($row = mysqli_fetch_assoc($result)) {?>
    
            <div class="card" style="width: 15rem;">
            <img src="../../../backEnd/uploads/<?= $row['product_image']?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $row['product_name']?></h5>
                <p class="card-text"><?=$row['product_description']?></p>
                <a href="../product/product.view.php?id=<?=$row['product_id']?>" class="btn btn-inside">Go somewhere</a>
            </div>
            </div>
                <?php
                }
            }
            ?>
    </div>
</main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>