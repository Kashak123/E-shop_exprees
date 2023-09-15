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
        <h3>View Cart</h3>
        <?php
        $i=1;
        
        $sql = "SELECT cartdetail.*, productdetail.productname, productdetail.price FROM cartdetail, productdetail WHERE 
        cartdetail.productid = productdetail.productid AND sessionid='" . $sessionId . "'";

        $result = $conn->query($sql);
        //die($sql);
        $tAmt = 0;

        echo "<form action=CalcCart.php method=post><table width=100% border=0 cellpadding=5><tr><td><b>Product Image </b></td><td><b>Product Name</b></td><td><b>Price</b></td><td><b>Qty</b></td><td align=right><b>Amount</b></td></tr>";

      while($row = $result->fetch_assoc())
        {
            echo "<tr><td><img src=products/" . $row["productid"] . ".jpg height=100></td><td>" . $row["productname"] . "</td>";
            echo "<td> ". $row["price"] . "</td>";

            echo "<td><input size=2 type=text name=qty" . $i . " value=" . $row["qty"] . "><input type=hidden name=product" . $i . " value=" . $row["productid"] . "><input type=hidden name=sno" . $i . " value=" . $row["sno"] . "></td>";
            //echo "<td align=right> ". $row["qty"] . "</td>";
            
            $amt = $row["price"] * $row["qty"];
            echo "<td align=right> ". $amt . "</td>";
            echo "<td align=right><a href=RemoveCartProduct.php?id=" . $row["sno"] . "><img src=delete.png height=40</a></td>";
            echo "</tr>";
            $tAmt += $amt;
            $i++;
        }
        $i--;
        
        echo "<tr><td colspan=4>Total Amount</td><td align=right>" . $tAmt . "</td></tr>";

        echo "</table><input type=hidden name=totProduct value=" . $i . "><center><input type=submit value='Calculate cart'><a href=orderform.php>Checkout</a></center></form>";

        if(isset($_GET["msg"]))
        {
            echo "<center><font color=red><b>" . $_GET["msg"] ."</b></font></center>";
        }
            ?>
            </td></tr></table>

            <?php
            $conn->close();
            ?>
    
</body>
</html>