<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php

        require '../../../backEnd/Model/includes/dbh.conn.inc.php';

        $product_id = $_GET['id'];

        $conn = new ConnectionDb();
        

        $stmt = PDO_NEW->prepare("select * from productsinfo where product_id = '$product_id' ");
        $stmt->execute();

        $product = $stmt->fetch();

        
    ?> 
    <div class="">
        <img src="../../../backEnd/uploads/<?=$product['product_image']?>" alt="">
        <h1><?=$product['product_name']?></h1>
    </div>  
    
</body>
</html>