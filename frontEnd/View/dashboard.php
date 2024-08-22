<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
        
        $conn = mysqli_connect("localhost:3307","root","","servicesdb");
        
        
        $sql = "SELECT * FROM productsinfo;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        
        if($resultCheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {?>
        
        <div class="card" style="width: 18rem;">
        <img src="../images/<?= $row['product_image']?>" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title"><?= $row['product_name']?></h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-inside">Go somewhere</a>
        </div>
        </div>
            <?php
            }
        }
        ?>
</body>
</html>