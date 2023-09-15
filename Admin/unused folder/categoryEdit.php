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
    if(isset($_SESSION["userId"]) && isset($_SESSION["adminPwd"]))
    {
        $userId = $_SESSION["userId"];
        $adminPwd  = $_SESSION["adminPwd"];
    }
    else
    {
        header('location:Login.php?msg=Session Expried,Please Relogin');
    }

    $conn = new mysqli("localhost", "root", "", "my_database");
    $sql = "SELECT * FROM adminuser WHERE userid= '" . $userId . "' AND password= '" .  $adminPwd . "'";

  
    $result = $conn->query($sql);
    if($row = $result->fetch_assoc())
    {
        $_SESSION["userId"] = $row["userid"];
        $_SESSION["adminPwd"] = $row["password"];
    }
    else
    {
        header('location:Login.php?msg=Session Expried,Please Relogin');
    }
    ?>

    <table width=100% cellspacing=0 cellpadding=0 >
        <tr>
            <td align=center><h1>E-Shop Admin Panel</h1></td>
        </tr>
        <tr>
            <td>
                <table width=100% cellspacing=0 cellpadding=0 bgcolor=#cceedd height=40>
                    <tr>
                        <td><a href=adminPage.php>Admin Home</a></td>
                        <td><a href=categoryList.php>Category List</a></td>
                        <td><a href=subCategoryList.php>Sub Category List</a></td>
                        <td><a href=productList.php>Products</a></td>
                        <td><a href=orderList.php>Orders</a></td>
                        <td><a href=userList.php>Users</a></td>
                        <td><a href=changePasswordForm.php>Change Password</a></td>
                        <td><a href=Logout.php>Logout</a></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>


            <?php
            $CatId = $_GET["CatId"];
            $sql = "SELECT * FROM catagorydetail WHERE categoryid= " . $CatId ;
            //die($sql);
  
            $result = $conn->query($sql);
            if($row = $result->fetch_assoc())
            {
            ?>
            
            <td>
                <h2>Edit Catagory</h2>
                <form action=CategoryUpdate.php method=post>
                <table width=100% cellspacing=0 cellpadding=0>
                    <tr>
                        <td>Category Name</td>
                        <td><input  value= "<?php  echo  $row ["categoryid"];  ?>" type=hidden name=txtId >
                        <input type=text  value= "<?php  echo  $row ["categoryname"];  ?>" name=txtName required maxlength=50></td>
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
            ?>
            </td>
        </tr>
    </table>
    <?php
    $conn->close();
    ?>
</body>
</html>