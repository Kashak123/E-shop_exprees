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
    $id = $_POST["txtId"];
    $name=$_POST["txtName"];
    $status=$_POST["rdoStatus"];

    if($id>0)
    $sql="UPDATE catagorydetail SET categoryname = '" .  $name . "', activestatus = " . $status . " WHERE categoryid = " .  $id;
   
    else
    $sql="INSERT INTO catagorydetail (categoryname, activestatus) VALUES ('" .  $name . "', " . $status .")";
    $conn->query($sql);
    
    header('location:categoryList.php');
    ?>
</body>
</html>