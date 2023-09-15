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
        <tr>
            <td>
                <h2>Product List</h2>
                <table cellspacing=2 cellpadding=5 border=1>
                    <tr>
                        <td></td> 
                        <td><b>Product Name</b></td> 
                        <td><b>Category </b></td>
                        <td><b>Sub Category Name</b></td>
                        <td><b>Price</b></td>
                        <td><b>Status</b></td>
                    </tr>
                        <?php
                        $sql="SELECT productdetail.productid, productdetail.productname, productdetail.price, productdetail.activestatus,
                        catagorydetail.categoryname, subcategorydetail.subcategoryname FROM productdetail, catagorydetail, subcategorydetail WHERE productdetail.categoryid = catagorydetail.categoryid AND productdetail.subcategoryid = subcategorydetail.subcategoryid  ORDER BY productname";
                        //die($sql);
                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc())
                        {
                            echo"<tr>";
                            echo"<td><img src=../products/" . $row["productid"] . ".jpg height=70></td>";
                            echo"<td><a href=productForm.php?productId=" . $row["productid"] . ">" .  $row["productname"] . "</a></td>";
                            echo"<td>" . $row["categoryname"] . "</td>";
                            echo"<td>" . $row["subcategoryname"] . "</td>";
                            echo"<td>" . $row["price"] . "</td>";
                            

                            echo"<td>";
                            if($row["activestatus"] == 1)
                                echo "Active";
                            else
                                echo "In-Active";       
                                
                            echo"</td></tr>";
                            }

                        ?>

                    
                </table>
                <a href=productForm.php?productId=0>Add Product</a>
            </td>
        </tr>
    </table>
    <?php
    $conn->close();
    ?>
</body>
</html>