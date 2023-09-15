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
        
        <?php

        $code=$_GET["code"];
        
        $sql = "SELECT * FROM productdetail WHERE activestatus=1 AND productid=" . $code;

        $result = $conn->query($sql);
        
        if(isset($_GET["msg"]))
            echo "<center><font color=red><b>" . $_GET["msg"] . "</b></font></center>";


        echo "<table width=100% cellpadding=5>";
        if($row = $result->fetch_assoc())
        {
            echo "<tr><td colspan=2><h3>" . $row["productname"] . "<h3></td></tr>";
            echo "<tr valign=top><td width=50%><img height=400 src=products/" . $row["productid"] . ".jpg></td>"; 

            echo "<td><b>Price</b> Rs." . $row["price"];
            echo "<p>" . $row["productdesc"] . "</p>";

            echo "<form action=add2cart?cart.php method=get><b>Qty</b> : <input size type=text name=qty value=" . $row["minqty"] . "><input type=hidden name= product value=" . $row["productid"] . "><input type=submit value='Add To Cart'></form>";
        }

    echo "</table>";
        ?>
        </td></tr></table>

        <?php
        $conn->close();
        ?>
    
</body>
</html>