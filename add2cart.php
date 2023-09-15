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
    $qty = $_GET["qty"];
    $product = $_GET["product"];

    $validQty = 1;

    $sql = "SELECT productname, qty, minqty, maxqty FROM productdetail WHERE productid=" . $product;

    $result = $conn->query($sql);
   // die($sql);
    if($row = $result->fetch_assoc())
    {
        if($qty < $row["minqty"])
        {
            $validQty = 0;
            $msg = "Qty. can not be lesser then " . $row["minqty"];
        }
        if($qty > $row["maxqty"])
        {
            $validQty = 0;
            $msg = "Qty. can not be more then " . $row["maxqty"];
        }
        if($qty > $row["qty"])
        {
            $validQty = 0;
            $msg = "Qty. can not be more then " . $row["qty"];
        }
        if($validQty == 1)
        {
           $sql = "INSERT INTO cartdetail (productid, qty, sessionid) VALUES (" . $product . ", " . $qty . ", '" . $sessionId . "')";
           $conn->query($sql);
           //die($sql);
            $msg = "product added into cart.";
        }
    }
        $conn->close();
        header('location:productdetail.php?code=' . $product . '&msg=' . $msg);

    ?>
    
</body>
</html>