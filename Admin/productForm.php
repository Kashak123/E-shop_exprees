<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function selectSubCategory(code)
        {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function()
            {
                if(this.readyState == 4 && this.status == 200)
                {
                    document.getElementById("subCategoryCell").innerHTML = this.responseText;
                }
            };
            xhttp.open("GET", "subcategoryfromcategory.php?code=" + code, true);
            xhttp.send();
        }


    </script>


</head>
<body>
    <?php
    include "top.php";
    ?>

        <tr>
            <td>

            <?php
            $productId=$_GET["productId"];
            if($productId > 0)
            {
                $sql="SELECT * FROM productdetail WHERE productid = " . $productId ;

                $result = $conn->query($sql);
                if($row = $result->fetch_assoc())
                {

                
            ?>
            <h2>Edit Product</h2>
                <form action=addProduct.php method=post enctype="multipart/form-data">
                <table width=100% cellspacing=0 cellpadding=0>
                    <tr>
                        <td>Poduct Name</td>
                        <td><input  value= "<?php  echo  $row["productid"]; ?>" type=hidden name=txtId ><input type=text  value= "<?php  echo  $row["productname"];  ?>" name=txtName required maxlength=50></td>
                    </tr>
                    <tr>

            <td>Category Name</td>
            <td>
                <select name="categorylist"  onchange="selectSubCategory(this.value);">
                    <?php
                    $sql1 = "SELECT catagorydetail.categoryname, catagorydetail.categoryid FROM catagorydetail ORDER BY categoryname";
                    $result1 = $conn->query($sql1);
                    while($row1 = $result1->fetch_assoc())
                    {
                        if($row1["categoryid"] == $row["categoryid"])
                        {
                            echo "<option selected value=" . $row1["categoryid"] . ">" . $row1["categoryname"] .  "</option>";
                        }
                        else
                        {
                            echo "<option value=" . $row1["categoryid"] . ">" . $row1["categoryname"] . "</option>";
                        }
                    } 
                    ?>
                    </select>
                    </td>
                      </tr>
                     <tr>
                    <td>Sub Category</td>
                    <td id=subCategoryCell>
                        <select name="subCategoryList">
                            <?php
                            $sql1 = "SELECT subcategorydetail.subcategoryname, subcategorydetail.subcategoryid FROM subcategorydetail WHERE categoryid =" . $row["categoryid"] . " ORDER BY subcategoryname";
                            
                            $result1 = $conn->query($sql1);
                            while($row1 = $result1->fetch_assoc())
                            {
                                if($row1["subcategoryid"] == $row["subcategoryid"])
                                {
                                    echo "<option selected value=" . $row1["subcategoryid"] . ">" . $row1["subcategoryname"] .  "</option>";
                                }
                                else
                                {
                                    echo "<option value=" . $row1["subcategoryid"] . ">" . $row1["subcategoryname"] . "</option>";
                                }
                            } 
                            ?>
                            </select>
                </td>
        </tr>
                    <tr>
                        <td>Price</td>
                        <td><input type=text  value= "<?php  echo  $row["price"];  ?>" name=txtPrice required ></td>
                    </tr>
                    <tr>
                        <td>Qty in Stock</td>
                        <td><input type=text  value= "<?php  echo  $row["qty"];  ?>" name=txtQty required ></td>
                    </tr>
                    <tr>
                        <td>Minimum Qty</td>
                        <td><input type=text  value= "<?php  echo  $row["minqty"];  ?>" name=txtMinQty required ></td>
                    </tr>
                    <tr>
                        <td>Maximum Qty</td>
                        <td><input type=text  value= "<?php  echo  $row["maxqty"];  ?>" name=txtMaxQty required ></td>
                    </tr>
                    <tr>
                        <td>Poduct Description</td>
                        <td><textarea  name=txtDesc required><?php  echo  $row["productdesc"];  ?> </textarea></td>
                    </tr>
                    
                    <tr>
                    <td>Status</td>
                    <td>
                    <?php 
                    if($row["activestatus"] == 1)
                    {
                        echo "<input type=radio name=rdoStatus value=1 checked>Active";
                        echo "<input type=radio name=rdoStatus value=0 >In-Active";
                    }
                    else
                    {
                        echo "<input type=radio name=rdoStatus value=1 >Active";
                        echo "<input type=radio name=rdoStatus value=0 checked >In-Active";
                    }
                    
                    ?>
                    
                </td>
                </tr>
                <td>Home Page</td>
                    <td>
                    <?php 
                    if($row["homepage"] == 1)
                    {
                        echo "<input type=radio name=rdohomeStatus value=1 checked>Yes";
                        echo "<input type=radio name=rdohomeStatus value=0 >No";
                    }
                    else
                    {
                        echo "<input type=radio name=rdohomeStatus value=1 >Yes";
                        echo "<input type=radio name=rdohomeStatus value=0 checked >No";
                    }
                    
                    ?>
                    </td>
                    </tr>
                
                    <tr>
                        <td>Upload Image</td><td><input type=file name=file1></td>
                    </tr>
                    <tr>
                        <td></td><td><input type=submit name=btnSubmit value="Update product"></td>
                    </tr>

                </table>
                </form>

                <?php
                }

            }
            else
            {
                ?>

                <tr>
                <td>
                <h2>Add Product</h2>
                <form action=addProduct.php method=post>
                <table width=100% cellspacing=0 cellpadding=0>
                    <tr>
                        <td>Product Name</td>
                        <td><input  value= 0 type=hidden name=txtId ><input type=text  name=txtName required maxlength=50></td>
                    </tr>
                    <tr>
                        <td>Category</td>
                        <td><select name=categorylist style= "width: 170px" onchange="selectSubCategory(this.value);">
                        <option value=0>Select</option>

                        <?php
                        $sql1 = "SELECT catagorydetail.* FROM catagorydetail  ORDER BY categoryname";
                        //die($sql1);
                        $result1 = $conn->query($sql1);

                        
                        while($row1 = $result1->fetch_assoc())
                        {
                            echo "<option value=" . $row1["categoryid"] . ">" . $row1["categoryname"] . "</option>";
                            
                        }
                        ?>
                        </select>
                    </td>
                    </tr>
                    <tr>
                        <td>Sub Category</td>
                        <td id=subCategoryCell>
                        <select name=subCategoryList></select>
                        </td>
                    </tr>

                    <tr>
                        <td>Price</td>
                        <td><input type=text  name=txtPrice required ></td>
                    </tr>
                    <tr>
                        <td>Qty in Stock</td>
                        <td><input type=text  name=txtQty required ></td>
                    </tr>
                    <tr>
                        <td>Minimum Qty</td>
                        <td><input type=text  name=txtMinQty required ></td>
                    </tr>
                    <tr>
                        <td>Maximum Qty</td>
                        <td><input type=text   name=txtMaxQty required ></td>
                    </tr>
                    <tr>
                        <td>Product Description</td>
                        <td><textarea  name=txtDesc required></textarea></td>
                    </tr>
                    
                    <tr>
                    <td>Status</td>
                    <td>
                        <input type=radio name=rdoStatus value=1 checked>Active
                        <input type=radio name=rdoStatus value=0 >In-Active
                    </td>
                    </tr>
                    <td>Home Page</td>
                    <td>
                        <input type=radio name=rdoStatus value=1 >Yes
                        <input type=radio name=rdoStatus value=0 checked >No
                    </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type=submit name=btnSubmit value="Add product"></td>
                    </tr>

                </table>
                </form>

                <?php
            }
                ?>

                    
                
            </td>
        </tr>
    </table>
    <?php
    $conn->close();
    ?>
</body>
</html>