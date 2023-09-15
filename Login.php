<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Login Form</h1>

    <form action="userPage.php" method=post>
    <table>
    <tr><td>Email</td><td><input type=text name=txtMail required></td></tr>
    <tr><td>Password</td><td><input type=password name=txtPassword required></td></tr>
    <tr><td></td><td><input type=submit  value=Login></td></tr>
   
    </table>
   
   
    <?php 
    if(isset($_GET["msg"]))
    {
        echo "<center><b><font color=red>" . $_GET["msg"] . "</font></b></center>";
    }
       
    ?>

</form>

</body>
</html>