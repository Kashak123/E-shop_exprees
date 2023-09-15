<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
    function Validate() {
            if (document.getElementById("newpass1").value != document.getElementById("newpass2").value) {
                alert("You first Passwords is not similar with 2nd password. Please enter same password in both");
                return false;
            }
            return true;
        }
        </script>
</head>
<body>
    <?php
    include "top.php";
    ?>
    <tr><td>
    <h1>Change Paasword</h1>

    <form action="AdminChangePassword.php" method=post>
    <table>
    <tr><td>Old Password</td><td><input type=password name=txtOldPassword required></td></tr>
    <tr><td>New Password</td><td><input type=password name=txtPassword id = newpass1 required></td></tr>
    <tr><td>Retype Password</td><td><input type=password name=txtPassword1 id = newpass2 required></td></tr>
    <tr><td></td><td><input type=submit  value=Login onclick='return Validate();'></td></tr>

    </table>
    </form>
    <?php
    

    if(isset($_GET["msg"]))
    {
    echo "<center><b><font color=green>" . $_GET["msg"] . "</font></b></center>";
    }
?>

</body>
</html>