<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    include 'top1.php';
    $id = $_GET["id"];
   

    $sql = "DELETE FROM cartdetail WHERE sno=" . $id . " AND sessionid='" . $sessionId . "'";

    $conn->query($sql);

    $msg = "Product removed fron the cart.";
    $conn->close();
    header('location:viewcart.php?msg=' . $msg);

    ?>
    
</body>
</html>