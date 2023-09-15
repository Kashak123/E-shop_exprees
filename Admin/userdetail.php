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
    <tr>
    <td>
    <h2>User Details</h2>
    <?php
    
    $sno = $_GET["sno"];

    $sql = "SELECT * FROM reguser WHERE sno=" . $sno;
    $result = $conn->query($sql);

    if($row = $result->fetch_assoc())
    {
        echo "<table cellspacing=2 cellpadding=5 border=1>";
        echo "<tr><td>Sno.</td><td>" . $row["sno"] . "</td></tr>";
        echo "<tr><td>Email</td><td>" . $row["email"] . "</td></tr>";
        echo "<tr><td>Password</td><td>" . $row["password"] . "</td></tr>";
        echo "<tr><td>Name</td><td>" . $row["name"] . "</td></tr>";
        echo "<tr><td>Gender</td><td>" . $row["gender"] . "</td></tr>";
        echo "<tr><td>Address</td><td>" . $row["address"] . "</td></tr>";
        echo "<tr><td>City</td><td>" . $row["city"] . "</td></tr>";
        echo "<tr><td>State</td><td>" . $row["state"] . "</td></tr>";
        echo "<tr><td>Country</td><td>" . $row["country"] . "</td></tr>";
        echo "<tr><td>Pin Code</td><td>" . $row["pincode"] . "</td></tr>";
        echo "<tr><td>Contact No</td><td>" . $row["contactno"] . "</td></tr>";
        echo "<tr><td>Active Status</td><td><form action=statusupdate.php method=post>
        <select name=txtStatus>";

        if($row["activestatus"] == 1)
        {
            echo "<option value=1 selected>Active</option><option value=0 >Inactive</option>";
        }
    
        else
        {
            echo "<option value=1 >Active</option><option value=0 selected>Inactive</option>";
        }
    
        echo "</select><input type=hidden name=txtSNo value=" . $sno . "><input type=submit value='submit'></form></td></tr>";
        echo "</table>";
        
       
        
        
    }
    ?>

    </td></tr>
</table>

<?php
    $conn->close();
    ?>
</body>
</html>