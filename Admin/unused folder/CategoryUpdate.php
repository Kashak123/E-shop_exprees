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
        header('location:Login.php?msg=Invalid Email and/or Password');
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
        $conn->close();
        header('location:Login.php?msg=Invalid Email and/or Password');
    }

    $id = $_POST["txtId"];
    $name=$_POST["txtName"];
    $status=$_POST["rdoStatus"];

    $sql="UPDATE catagorydetail SET categoryname = '" .  $name . "', activestatus = " . $status . " WHERE categoryid = " .  $id;
    //die($sql);
    $conn->query($sql);

    $conn->close();
    header('location:categoryList.php');
    ?>
</body>
</html>