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

            <?php
            $subCatId=$_GET["subCatId"];
            if($subCatId > 0)
            {
                $sql="SELECT * FROM subcategorydetail WHERE subcategoryid = " . $subCatId ;

                $result = $conn->query($sql);
                if($row = $result->fetch_assoc())
                {

                
            ?>
            <h2>Edit Sub Catagory</h2>
                <form action=addSubCategory.php method=post>
                <table width=100% cellspacing=0 cellpadding=0>
                    <tr>
                        <td>Sub Category Name</td>
                        <td><input  value= "<?php  echo  $row["subcategoryid"]; ?>" type=hidden name=txtId ><input type=text  value= "<?php  echo  $row["subcategoryname"];  ?>" name=txtName required maxlength=50></td>
                    </tr>
                    <tr>
                        <td> Category </td>
                        <td><select name=Categorylist style= "width: 170px">

                        <?php
                        $sql1 = "SELECT * FROM catagorydetail ORDER BY categoryname";

                        $result1 = $conn->query($sql1);

                        
                        while($row1 = $result1->fetch_assoc())
                        {
                            if($row1["categoryid"] == $row["categoryid"])
                            {
                                echo "<option selected value=" . $row1["categoryid"] . ">" . $row1["categoryname"] . "</option>";
                            }
                            else
                            {
                                echo "<option  value=" . $row1["categoryid"] . ">" . $row1["categoryname"] . "</option>";
                            }
                        }
                        ?>
                        </select>
                    </td>
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
                    <tr>
                        <td></td>
                        <td><input type=submit name=btnSubmit value="Update Sub-Category"></td>
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
                <h2>Add Sub Category</h2>
                <form action=addSubCategory.php method=post>
                <table width=100% cellspacing=0 cellpadding=0>
                    <tr>
                        <td>Sub Category Name</td>
                        <td><input  value= "0" type=hidden name=txtId ><input type=text name=txtName required maxlength=50></td>
                    </tr>
              
                    <tr>
                        <td>Category </td>
                        <td><select name=Categorylist style= "width: 170px">

                        <?php
                        $sql1 = "SELECT * FROM catagorydetail ORDER BY categoryname";
                        //die(sql1);
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
                        <td>Status</td>
                        <td><input type=radio name=rdoStatus value=1 checked>Active<input type=radio name=rdoStatus value=0 >In-Active</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type=submit name=btnSubmit value="Add Sub-Category"></td>
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