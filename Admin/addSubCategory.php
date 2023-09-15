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
    $id=$_POST["txtId"];
    $name=$_POST["txtName"];
    $categorylist = $_POST["Categorylist"];
    $status=$_POST["rdoStatus"];

    if($id > 0)

    $sql="UPDATE subcategorydetail SET subcategoryname = '" .  $name . "', categoryid = " .  $categorylist . ", activestatus = " . $status . " WHERE subcategoryid = " .  $id;

    else
    $sql="INSERT INTO subcategorydetail (subcategoryname, categoryid, activestatus) VALUES ('" .  $name . "', " . $categorylist . ", " . $status .")";
    //die($sql);
    $conn->query($sql);
    
    header('location:subCategoryList.php');
    ?>
</body>
</html>