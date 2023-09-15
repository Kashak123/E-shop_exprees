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
//die($sql);

$result = $conn->query($sql);
if($row = $result->fetch_assoc())
{
    $password = $_POST["txtPassword"];

    $sql1="UPDATE adminuser SET password ='" . $password . "' WHERE userid='" . $userId . "'" ;
   // die($sql1);

    $conn->query($sql1);

    $_SESSION["adminPwd"] = $password;
    $conn->close();

    header('location:changePasswordForm.php?msg=Password Changed Successfully');
}
else
{
    $conn->close();
    header('location:changePasswordForm.php?msg=Invalid Old Password, Enter Again');
}
?>
</body>
</html>