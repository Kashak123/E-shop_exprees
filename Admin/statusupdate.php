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
    $sno = $_POST["txtSNo"];
    $activeSt = $_POST["txtStatus"];

    $sql = "UPDATE reguser SET activestatus=" . $activeSt. " WHERE sno=" . $sno;
    //die($sql);


    $conn->query($sql);
    $conn->close();

    header('location: userList.php');
?>
</body>
</html>