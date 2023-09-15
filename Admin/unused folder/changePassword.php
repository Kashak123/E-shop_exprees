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

$email = $_SESSION["email"];
$pwd = $_POST["txtOldPassword"];

$conn = new mysqli("localhost", "root", "", "my_database");

$sql = "SELECT * FROM reguser WHERE email = '" .   $email . "' AND password = '" . $pwd . "' AND activestatus = 1";

//die($sql);
$result = $conn->query($sql);

if($row = $result->fetch_assoc())
{
    $password = $_POST["txtPassword"];

    $sql="UPDATE reguser SET password ='" . $password . "' WHERE email='" . $email . "'" ;

    $conn->query($sql);

    $_SESSION["pwd"] = $password;
    $conn ->close();

    header('location:userPage.php?msg=Password Changed Successfully');
}
else
{
    $conn ->close();
    header('location:changepasswordform.php?msg=Invalid Old Password, Enter Again');
}
?>
</body>
</html>