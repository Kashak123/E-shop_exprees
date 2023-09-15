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

    $email = $_SESSION["email"];
    $pwd = $_SESSION["pwd"];

    $conn = new mysqli("localhost", "root", "", "my_database");

    $sql = "SELECT * FROM reguser WHERE email = '" .   $email . "' AND password = '" . $pwd . "' AND activestatus = 1";

    //die($sql);
    $result = $conn->query($sql);

    if($row = $result->fetch_assoc())
    {
        ;
    }
    else
    {
        $conn ->close();
        header('location:Login.php?msg=Session Expried, Please Relogin');
    }
  
    $email = $_POST["txtMail"];
    $name = $_POST["nameTxt"];
    $gender = $_POST["genderType"];
    $address = $_POST["addressTxt"];
    $city = $_POST["cityTxt"];
    $state = $_POST["stateTxt"];
    $country = $_POST["countryTxt"];
    $pincode = $_POST["pinCodeTxt"];
    $mobile = $_POST["mobileTxt"];


    $sql="UPDATE reguser SET email ='" .  $email . "', name='" . $name .  "', gender='" . $gender . "', address= '" . $address .  "', city= '" .  $city  . "', state='" .  $state . "', country='" . $country . "', pincode= '" . $pincode . "', contactno='" . $mobile . "' WHERE
    email='" . $email . "'" ;

    //die($sql);

    $conn->query($sql);
    $conn->close();

    header('loction: UserPage.php');
    ?>
    
</body>
</html>