<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body >
    <h1 align=center>Admin Login Form</h1>

    <form action="adminPage.php" method=post>
    <table align=center >
    <tr><td>User Id</td><td><input type=text name=txtUserId required></td></tr>
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