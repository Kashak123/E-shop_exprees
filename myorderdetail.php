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

    <td width=80%>
    <h2>MY Order List</h2>
    <?php
    echo "<table><tr><td width=60% >";
    $oId = $_GET["oId"];

    $sql = "SELECT * FROM ordermaster WHERE orderno=" . $oId;
    $result = $conn->query($sql);

    if($row = $result->fetch_assoc())
    {
        echo "<table cellspacing=2 cellpadding=5 border=1>";
        echo "<tr><td>Order No.</td><td>" . $row["orderno"] . "</td></tr>";
        echo "<tr><td>Order Date</td><td>" . $row["orderdate"] . "</td></tr>";
        echo "<tr><td>Customer Name</td><td>" . $row["name"] . "</td></tr>";
        echo "<tr><td>Address</td><td>" . $row["address"] . "</td></tr>";
        echo "<tr><td>City</td><td>" . $row["city"] . "</td></tr>";
        echo "<tr><td>State</td><td>" . $row["state"] . "</td></tr>";
        echo "<tr><td>Country</td><td>" . $row["country"] . "</td></tr>";
        echo "<tr><td>Pin Code</td><td>" . $row["pincode"] . "</td></tr>";
        echo "<tr><td>Email</td><td>" . $row["contactno"] . "</td></tr>";
        echo "<tr><td>Order Amount</td><td>" . $row["orderamt"] . "</td></tr>";
        echo "<tr><td>Pay Mode</td><td>" . $row["paymentmode"] . "</td></tr>";
        echo "<tr><td>Order Status</td><td>" . $row["orderstatus"]. "</td></tr>";
        echo "</table>";
        echo "</td><td>";
        echo "<h2>My Products </h2>";
        echo "<table cellspacing=2 cellpadding=5 border=1><tr><td></td><td><b>Product</b></td><td><b>Qty</b></td><td><b>Price</b></td><td><b>Amount<b></td></tr>";

        $sql1 = "SELECT orderproducts.*, productdetail.productname FROM orderproducts, productdetail WHERE orderproducts.productid = productdetail.productid AND orderno=" . $oId;
        //die($sql1);
        $result1 = $conn->query($sql1);

        while($row1 = $result1->fetch_assoc())
        {
            echo "<tr><td><img src=products/" . $row1["productid"] . ".jpg height=100</td>";
            echo "<td>" . $row1["productname"] . "</td>";
            echo "<td>" . $row1["qty"] . "</td>";
            echo "<td>" . $row1["price"] . "</td>";
            $amt = $row1["qty"] * $row1["price"];
            echo "<td>" . $amt . "</td></tr>";

        }
        echo "</table>";
        echo "</td></tr></table>";
    }
    ?>

    </td></tr>
</table>

<?php
    $conn->close();
    ?>
</body>
</html>