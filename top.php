<?php
   
    session_start();
    $sessionId = session_id();



    $conn = new mysqli("localhost", "root", "", "my_database");
    ?>
    <h1 align=center>E-Shop</h1>
    <table width=100% cellspacing=0 cellpadding=0 >
        <tr>
            <td colspan=2>
            <table width=100% cellspacing=0 cellpadding=0 bgcolor=cyan height=40>
                    <tr>
                        <td><a href=index.php>Home</a></td>
                        <td><a href=catalog.php>Products</a></td>
                        <td><a href=viewcart.php>View Cart</a></td>
                        <td><a href=aboutus.php>About Us</a></td>
                        <td><a href=query.php>query</a></td>
                        <td><a href=contactus.php>Contact Us</a></td>
                        
                    </tr>
                </table>
            </td>
        </tr>
       
        <tr valign = top><td width=20%>
        <table width=100%><tr><td height=50 bgcolor=#ddeeff align=center><b><font color=black>Browse Product Catalog</font></b></td></tr>
            <?php
            $sql = "SELECT * FROM catagorydetail WHERE activestatus=1 ORDER BY categoryname";
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc())
            {
                echo "<tr><td><a href = catalog.php?catId=" . $row["categoryid"] . ">" . $row["categoryname"] . "</a></td></tr>";

                $sql1 = "SELECT * FROM subcategorydetail WHERE activestatus=1 AND categoryid= " . $row["categoryid"] . " ORDER BY  subcategoryname";
                //die($sql1);

                $result1 = $conn->query($sql1);

                while($row1  = $result1->fetch_assoc())
                {
                    echo "<tr><td>--<a href = catalog.php?catId=" . $row["categoryid"] . "&subCatId=" . $row1["subcategoryid"] .     
                    ">" . $row1["subcategoryname"] . "</a></td></tr>";
                }
            }

            ?>
            </table>


            <?php

            $email = "";
            $pwd = "";
            if(isset($_SESSION["email"]) && isset($_SESSION["pwd"]))
            {
            $email = $_SESSION["email"];
            $pwd  = $_SESSION["pwd"];
            }

            $sql = "SELECT * FROM reguser WHERE email='" . $email . "' AND password='" .  $pwd . "' AND activestatus=1";
            //die($sql);
  
        $result = $conn->query($sql);

        if($row = $result->fetch_assoc())
        {
            
            $_SESSION["email"] = $row["email"];
            $_SESSION["pwd"] = $row["password"];

            echo "<br><b> welcome " . $row["name"] ."</b>";
            echo "<br><a href=editProfile.php>Edit Profile</a>";
            echo "<br><a href=changePasswordForm.php>Change Password</a>";
            echo "<br><a href=myorderlist.php>My Order</a>";
            echo "<br><a href=logout.php>Logout</a>";

        }
        else
        {
        ?>
        <form action=userPage.php method=post>
        <table>
            
            <tr><td><b>Members</b></td></tr>
            <tr><td>Email</td><td><input type=text name=txtMail required></td></tr>
            <tr><td>Password</td><td><input type=password name=txtPassword required></td></tr>
            <tr><td></td><td><input type=submit  value=Login></td></tr>
   
        </table>
        <form action=registration.php method=post>
        <table>
           
            <tr><td><b>New Members</b></td></tr>
            <tr><td><a href = registration_form.php>Register Here</a></td></tr>
            
   
        </table>
        <?php

        }
        ?>
        
        
    </form>
        
        </td>