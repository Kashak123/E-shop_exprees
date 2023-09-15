<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include 'top.php';
    ?>

    <td width=80%>
        <h3>Order form</h3>
        <h4>View Cart</h4>
      
    
    <?php
    $name = $_POST["nameTxt"];
    $address = $_POST["addressTxt"];
    $city = $_POST["cityTxt"];
    $state = $_POST["stateTxt"];
    $country = $_POST["countryTxt"];
    $pin = $_POST["pinCodeTxt"];
    $email = $_POST["txtMail"];
    $phone = $_POST["mobileTxt"];
    $orderAmt = $_POST["txtOrderAmt"];
    $payMode = $_POST["payMode"];


    $orderDate = date('Y-m-d');;

    $oId =1;
    $sql = "SELECT MAX(orderno) AS MAXId FROM ordermaster";
    $result= $conn->query($sql);
    if($row = $result->fetch_assoc())
    {
        $oId = $row["MAXId"] + 1;

    }
    else
    {
        $oId=1;
    }
    

    $sql = "INSERT INTO ordermaster(orderno, orderdate, name, address, city, state, country, pincode, email, contactno, orderamt, paymentmode, orderstatus) VALUES(" . $oId . ", '" . $orderDate  . "', '" . $name . "', '" . $address .  "', '"
    .  $city .  "', '" . $state . "', '" . $country . "', '" . $pin . "', '" . $email . "', '" . $phone . "', " . $orderAmt . ", '" . $payMode . "', 'Pending Payment')";

    //die($sql);
    $conn->query($sql);


    $sql = "SELECT cartdetail.*, productdetail.price FROM cartdetail, productdetail WHERE cartdetail.productid = productdetail.productid AND sessionid='" . $sessionId . "'";
    $result = $conn->query($sql);
    while($row = $result->fetch_assoc())
    {
        $sql1 = "INSERT INTO orderproducts(orderno, productid, qty, price) VALUES (" . $oId . ", " . $row["productid"] . ", " . $row["qty"] . ", " . $row["price"] . ")";
        $conn->query($sql1);

    }

    $sql = "DELETE FROM cartdetail WHERE sessionid='" . $sessionId . "'";
    $conn->query($sql);



    $conn->close();
    header('location:Thanks.php?Name=' . $name . '&orderno=' . $oId)
    ?>
</body>
</html>