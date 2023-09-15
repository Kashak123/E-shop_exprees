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
    $msg="";

    $totProduct = $_POST["totProduct"];

    for($i=1;$i<=$totProduct; $i++)
    {

    $qty = $_POST["qty" . $i];
    $product = $_POST["product" . $i];
    $id = $_POST["sno". $i];

    $validQty = 1;

    $sql = "SELECT productname, qty, minqty, maxqty FROM productdetail WHERE productid=" . $product;

    //die($sql);

    $result = $conn->query($sql);
   // die($sql);
    if($row = $result->fetch_assoc())
    {
        if($qty < $row["minqty"])
        {
            $validQty = 0;
            $msg = "<br>Qty. of " . $row["productname"] . " can not be lesser then " . $row["minqty"];
        }
        if($qty > $row["maxqty"])
        {
            $validQty = 0;
            $msg = "<br>Qty. of " . $row["productname"] . " can not be more then " . $row["maxqty"];
        }
        if($qty > $row["qty"])
        {
            $validQty = 0;
            $msg = "<br>Qty. of " . $row["productname"] . " can not be more then " . $row["qty"];
        }
        if($validQty == 1)
        {
           $sql = "UPDATE cartdetail SET qty=" . $qty . " WHERE sno=" . $id . " AND sessionid='" . $sessionId . "'";
           $conn->query($sql);
           //die($sql);
            $msg = "<br>" . $row["productname"] . " <br>product updated into cart.";
        }
    }
    }
        $conn->close();
        header('location:viewcart.php?msg=' . $msg);

    ?>
    
</body>
</html>