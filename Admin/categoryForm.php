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
    
    <tr><td>

    <?php
    $CatId = $_GET["CatId"];
    if($CatId>0)
    {
        $sql="SELECT * FROM catagorydetail WHERE categoryid = " . $CatId ;

        $result = $conn->query($sql);
        if($row = $result->fetch_assoc())
        {

        
    ?>

                <h2>Edit Catagory</h2>
                <form action=addCategory.php method=post>
                <table width=100% cellspacing=0 cellpadding=0>
                    <tr>
                        <td>Category Name</td>
                        <td><input  value= "<?php  echo $row["categoryid"];  ?>" type=hidden name=txtId >
                        <input type=text  value= "<?php echo $row ["categoryname"];  ?>" name=txtName required maxlength=50></td>
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
                        <td><input type=submit name=btnSubmit value="Update Category"></td>
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
                <h2>Add Category</h2>
                <form action=addCategory.php method=post>
                <table width=100% cellspacing=0 cellpadding=0>
                    <tr>
                        <td>Category Name</td>
                        <td><input  value=0 type=hidden name=txtId ><input type=text name=txtName required maxlength=50></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><input type=radio name=rdoStatus value=1 checked>Active<input type=radio name=rdoStatus value=0 >In-Active</td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type=submit name=btnSubmit value="Add Category"></td>
                    </tr>

                </table>
                </form>

                    
                
            </td>
        </tr>
    </table>
    </form>

    <?php
    }
    ?>

    <?php
    $conn->close();
    ?>
</body>
</html>