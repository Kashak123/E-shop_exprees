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
        $catId=0;
        $subCatId=0;

        $heading = "Catalog";

        $sql="SELECT productid, productname, price, minqty from productdetail WHERE activestatus=1";
       // die($sql);
        
        if(isset($_GET["catId"]))
        {
            $catId=$_GET["catId"];
            $sql = $sql . " AND categoryid= ". $catId;

            $sql1 = "SELECT categoryname FROM catagorydetail WHERE categoryid=" . $catId;
            

            $result1 = $conn->query($sql1);
            if($row1 = $result1->fetch_assoc())
            {
                $heading .= " :: " . $row1["categoryname"];
            }
        }
        if(isset($_GET["subCatId"]))
        {
            $subCatId=$_GET["subCatId"];
            $sql .= " AND subcategoryid= ". $subCatId;
      
            $sql1 = "SELECT subcategoryname FROM subcategorydetail WHERE subcategoryid=" . $subCatId;
           
           
            $result1 = $conn->query($sql1);
            if($row1 = $result1->fetch_assoc())
            {
                $heading .= " :: " . $row1["subcategoryname"];
            }
            
        }
        $result = $conn->query($sql);
     
        //die($sql);
        $i = 1;
        echo "<h3>" . $heading . "</h3>";
     
        echo "<table width=100% cellpadding=5><tr>";
        while($row = $result->fetch_assoc())
        {
            if($i % 4 == 1)
            echo "<tr><td width=25%>&nbsp;</td><td width=25%>&nbsp;</td><td width=25%>&nbsp;</td><td width=25%>&nbsp;</td></tr><tr>";

            echo "<td width=25%><a href=productdetail.php?code=" . $row["productid"] . "><img height=100 src=products/" . $row["productid"] . ".jpg></a><br><b><a href= productdetail.php?code=" .  $row["productid"] . ">" .  $row["productname"] . "</a></b><br><b>Price</b>: Rs. " . $row["price"] . "<br><a href=add2cart.php?product=" . $row["productid"] . "&qty=" . $row["minqty"] . ">Add to Cart</a></td>";

            $i++;
            
        }
        echo "</table>";

        ?>
        </td></tr></table>

        <?php
        $conn->close();
        ?>
    
</body>
</html>