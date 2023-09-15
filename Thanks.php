<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    include 'top.php';
    ?>
    <td width=80%>
    <?php
    echo "<h2> Thanks For Your Order </h2>";

    echo "<p>Thanks " . $_GET["Name"] . " for Your Order, Your Order No. is" . $_GET["orderno"] . " , we will deliver your Order soon. </p>";
    ?>
    </td></tr>
    </table>    

    <?php
    $conn->close();
    ?>
    
</body>
</html>