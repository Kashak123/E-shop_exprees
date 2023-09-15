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
    
        
        $sql = "SELECT cartdetail.*, productdetail.productname, productdetail.price FROM cartdetail, productdetail WHERE 
        cartdetail.productid = productdetail.productid AND sessionid='" . $sessionId . "'";

        $result = $conn->query($sql);
        //die($sql);
        $tAmt = 0;

        echo "<table width=100% border=0 cellpadding=5><tr><td><b>Product Image </b></td><td><b>Product Name</b></td><td><b>Price</b></td><td><b>Qty</b></td><td align=right><b>Amount</b></td></tr>";

      while($row = $result->fetch_assoc())
        {
            echo "<tr><td><img src=products/" . $row["productid"] . ".jpg height=100></td><td>" . $row["productname"] . "</td>";
            echo "<td> ". $row["price"] . "</td>";
            echo "<td align=right> ". $row["qty"] . "</td>";

            $amt = $row["price"] * $row["qty"];
            echo "<td align=right> ". $amt . "</td>";
            echo "<td align=right><a href=RemoveCartProduct.php?id=" . $row["sno"] . "><img src=delete.png height=40</a></td>";
            echo "</tr>";
            $tAmt += $amt;
        
        }
        
        
            echo "<tr><td colspan=4>Total Amount</td><td align=right>" . $tAmt . "</td></tr>";
            echo "</table>";

            $email="";
            $pwd="";
            $name="";
            $address="";
            $city="";
            $state="";
            $country="";
            $pinCode="";
            $phone="";
            
            if(isset($_SESSION["email"]) && isset($_SESSION["pwd"]))
            {
                $email = $_SESSION["email"];
                $password  = $_SESSION["pwd"];
            }


            $sql = "SELECT * FROM reguser WHERE email= '" . $email . "' AND password= '" .  $password . "' AND activestatus=1";

            $result = $conn->query($sql);

            if($row = $result->fetch_assoc())
            {
                $name=$row["name"];
                $address=$row["address"];
                $city=$row["city"];
                $state=$row["state"];
                $country=$row["country"];
                $pinCode=$row["pincode"];
                $name=$row["name"];
                $phone=$row["contactno"];

            }


        ?>

        <h4>Order form</h4>
        <form action=order.php method=post>
        <table>
       
        <tr><td>Name</td><td><input type=text name=nameTxt value="<?php  echo $name; ?>" maxlength=50 required></td></tr>
        <tr><td>Address</td><td><input type=text name=addressTxt value="<?php  echo $address; ?>"  maxlength=100 required></td></tr>
        <tr><td>City</td><td><input type=text name=cityTxt value="<?php  echo $city; ?>"  maxlength=50 required></td></tr>
        <tr><td>State</td><td><input type=text name=stateTxt value="<?php  echo $state; ?>"  maxlength=50 required></td></tr>
        <tr><td>Country</td><td><input type=text name=countryTxt value="<?php  echo $country; ?>"  value="<?php  echo $name; ?>"  maxlength=50 required></td></tr>
        <tr><td>Pin Code</td><td><input type=text name=pinCodeTxt  value="<?php  echo $pinCode; ?>" maxlength=50 required></td></tr>
        <tr><td>Email</td><td><input type=text name=txtMail  value="<?php  echo $email; ?>" maxlength=50 required></td></tr>
        <tr><td>Contact No</td><td><input type=text name=mobileTxt value="<?php  echo $phone; ?>"  maxlength=10 required></td></tr>
        <tr><td>Payment Mode</td><td><select name=payMode><option>COD</option><option>Credit Card</option><option>Debit card</option><option>Bank Transfer</option></td></tr>
        
        <tr><td></td><td><input type=hidden name=txtOrderAmt value=<?php  echo $tAmt;  ?>><input type=submit value="Order Now"></td></tr>
    </table>
    </form>


        </td></tr></table>

        


        <?php
        $conn->close();
        ?>
    
</body>
</html>