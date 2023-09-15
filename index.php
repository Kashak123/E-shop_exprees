<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
   
    session_start();
    $sessionId = session_id();



    $conn = new mysqli("localhost", "root", "", "my_database");
    ?>
    <h1 align=center>E-Shop</h1>
    <table width=100% cellspacing=0 cellpadding=0 >
        <tr>
            <td colspan=2>
            <table width=100% cellspacing=0 cellpadding=0 bgcolor=cyan height=40>
                    <tr>
                        <td><a href=index.php>Home</a></td>
                        <td><a href=catalog.php>Products</a></td>
                        <td><a href=viewcart.php>View Cart</a></td>
                        <td><a href=profile.php>About Us</a></td>
                        <td><a href=querydetail.php>query</a></td>
                        <td><a href=contactus.php>Contact Us</a></td>
                        
                    </tr>
                </table>
            </td>
        </tr>
    
    


<tr>
    <?php
    $i=1;
    $sql = "SELECT * FROM productdetail WHERE homepage=1 ";
    $result = $conn->query($sql);
    echo "<table width=100% cellpadding=10 ><tr>";
    while($row = $result->fetch_assoc())
    {
        if($i % 4== 1)
      
            echo "<tr><td width=25%>&nbsp;</td><td width=25% >&nbsp;</td><td width=25%>&nbsp;</td><td width=25%>&nbsp;</td></tr><tr>";

            echo "<td width=25%><img height=100 src=products/" . $row["productid"] . ".jpg><br><b>" .  $row["productname"] . "</b><br><b>Price</b>: Rs. " . $row["price"] . "<br><a href=add2cart.php?product=" . $row["productid"] . "&qty=" . $row["minqty"] . ">Add to Cart</a>";

            $i++;
            
    

    }

    $conn->close();


?>
</td><tr>
   </table>






</body>
</html>