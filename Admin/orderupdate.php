<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include "top.php";
    ?>
<tr><td>
<?php
    $orderId = $_POST["txtOrderNo"];
    $orderSt = $_POST["txtOrderStatus"];

    $sql = "UPDATE ordermaster SET orderstatus='" . $orderSt. "' WHERE orderno=" . $orderId;

    $conn->query($sql);
    $conn->close();

    header('location: orderList.php');
?>
</body>
</html>