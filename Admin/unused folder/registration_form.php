<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<script>
function checkPsw()
{
    if(document.getElementById('pswFirst').value != document.getElementById('confirmPsw').value)
    {
        alert("You first Passwords is not similar with 2nd password. Please enter same password in both");
        return false;
    }
   return true;
}   
</script>
</head>
<body>

    <h1>Registration Form</h1>
    <form action="registration.php" method="post">
    <table>
    <tr><td>Email</td><td><input type=text name=txtMail maxlength=50 required></td></tr>

    <tr><td>Password</td><td><input type=password name=txtPassword id="pswFirst" 
    maxlength=25 required></td></tr>

    <tr><td>Retype Password</td><td><input type=password name=txtPassword1 id="confirmPsw"  
    maxlength=25 required ><label id ='check'></label></td></tr>
    
    <tr><td>Name</td><td><input type=text name=nameTxt maxlength=50 required></td></tr>

    <tr><td>Gender</td><td><input type=radio name=genderType value=Male checked>Male<input type=radio name=genderType value=Female>Female</td></tr>

    <tr><td>Address</td><td><input type=text name=addressTxt maxlength=100 required></td></tr>

    <tr><td>City</td><td><input type=text name=cityTxt maxlength=50 required></td></tr>

    <tr><td>State</td><td><input type=text name=stateTxt maxlength=50 required></td></tr>

    <tr><td>Country</td><td><input type=text name=countryTxt maxlength=50 required></td></tr>

    <tr><td>Pin Code</td><td><input type=text name=pinCodeTxt maxlength=50 required></td></tr>

    <tr><td>Contact No</td><td><input type=text name=mobileTxt maxlength=10 required></td></tr>
    
    <tr><td></td><td><input type=submit value="Register" onclick =' return checkPsw();'></td></tr>


    </table>
    

  
</form>
</body>
</html>