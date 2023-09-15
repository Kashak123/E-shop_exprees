<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include 'top1.php';

    $email = $_POST["txtMail"];
    $password = $_POST["txtPassword"];
    $name = $_POST["nameTxt"];
    $gender = $_POST["genderType"];
    $address = $_POST["addressTxt"];
    $city = $_POST["cityTxt"];
    $state = $_POST["stateTxt"];
    $country = $_POST["countryTxt"];
    $pincode = $_POST["pinCodeTxt"];
    $mobile = $_POST["mobileTxt"];


    $sql="INSERT INTO reguser (email, password, name, gender, address, city, state, country, pincode, contactno, activestatus) VALUES ('" . $email . "', '" .  $password . "', '" .  $name  . "', '" . $gender . "', '" . $address . "', '" . $city . "', '" .  $state . "', '" . $country . "', '" . $pincode . "', '" .  $mobile . "', 1)";

    //die($sql);

    $conn->query($sql);
    $conn->close();

    header('location:catalog.php');

    ?>
</body>
</html>