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
    $categoryList = $_POST["categorylist"];
    $subCategoryList = $_POST["subCategoryList"];
    $price = $_POST["txtPrice"];
    $qty = $_POST["txtQty"];
    $minQty = $_POST["txtMinQty"];
    $maxQty = $_POST["txtMaxQty"];
    $productDesc = $_POST["txtDesc"];
    $status = $_POST["rdoStatus"];
    $homepage = $_POST["rdohomeStatus"];


   
    if($id > 0)

    $sql="UPDATE productdetail SET productname = '" .  $name . "', categoryid = " .  $categoryList . ", subcategoryid=" . $subCategoryList .  ",   price=" .  $price . ", qty= " . $qty . ", minqty= " . $minQty . ", maxqty= " .  $maxQty . ", productdesc= '" . $productDesc . "', activestatus= " . $status . ", " . "homepage= " . $homepage . " WHERE productid = " .  $id;

    $target_dir="../products/";
    $target_file = $target_dir . basename($_FILES["file1"]["name"]);
    $uploadOK = 1;
    
    $imageFileType = strtolower(pathinfo($target_file , PATHINFO_EXTENSION));

    if($_FILES["file1"]["size"] > 1000000)
    {
        echo "Sorry, your file is too large";
        $uploadOK = 0;
    }
    if($imageFileType != "jpg")
    {
        $uploadOK = 0;
    }
    if($uploadOK = 1)
    {
        $target_file = $target_dir . $id . ".jpg";
        if(move_uploaded_file($_FILES["file1"]["tmp_name"], $target_file))
        {
            ;
        }
    }


    else
    $sql = "INSERT INTO productdetail(productname, categoryid, subcategoryid, price, qty, minqty, maxqty, productdesc, activestatus, homepage) VALUES ('" .  $name . "', " . $categoryList . ", " . $subCategoryList . ", " . $price . ", " . $qty . ", " . $minQty . ", " . $maxQty. ", '" . $productDesc . "', " . $status . ", " . $homepage . ")";

    //die($sql);

    $conn->query($sql);
    
    header('location:productList.php');
    ?>
</body>
</html>