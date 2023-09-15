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
    $pwd = $_SESSION["pwd"];

    $conn = new mysqli("localhost", "root", "", "my_database");

    $sql = "SELECT * FROM reguser WHERE email = '" .   $email . "' AND password = '" . $pwd . "' AND activestatus = 1";

   // die($sql);
    $result = $conn->query($sql);

    if($row = $result->fetch_assoc())
    {
    ?>
    
    <h1>Edit Profile</h1>
    <form action="updateProfile.php" method="post">
    <table>

    <tr><td>Email</td><td><input type=text name=txtMail value="<?php echo $row["email"]; ?>"  maxlength=50 required readonly></td></tr>
    
    <tr><td>Name</td><td><input type=text name=nameTxt  value ="<?php echo $row["name"]; ?>" maxlength=50 required></td></tr>
    
    <tr><td>Gender</td><td>
        
    <?php
    if($row["gender"] == "Male")
    {
        echo "<input type=radio name=genderType value=Male checked> Male <input type=radio name=genderType value=Female>Female";
    }

    else
    {
        echo "<input type=radio name=genderType value=Male > Male <input type=radio name=genderType value=Female checked >Female";
    }

    ?>
    </td></tr>
    

    <tr><td>Address</td><td><input type=text name=addressTxt value="<?php echo $row["address"]; ?>"  maxlength=100 required></td></tr>

    <tr><td>City</td><td><input type=text name=cityTxt  value="<?php echo $row["city"]; ?>" maxlength=50 required></td></tr>

    <tr><td>State</td><td><input type=text name=stateTxt value="<?php echo $row["state"]; ?>" maxlength=50 required></td></tr>

    <tr><td>Country</td><td><input type=text name=countryTxt value="<?php echo $row["country"]; ?>" maxlength=50 required></td></tr>

    <tr><td>Pin Code</td><td><input type=text name=pinCodeTxt value="<?php echo $row["pincode"]; ?>" maxlength=50 required></td></tr>

    <tr><td>Contact No</td><td><input type=text name=mobileTxt value="<?php echo $row["contactno"]; ?>"  maxlength=10 required></td></tr>
    
    <tr><td></td><td><input type=submit value="Update Profile"></td></tr>

    </table>
    </form>
    

    <?php
    }
    $conn->close();
    ?>


</body>
</html>