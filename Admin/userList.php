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
                <h2>User List</h2>
                <table cellspacing=2 cellpadding=5 border=1>
                    <tr>
                        <td><b>Email</b></td> 
                        <td><b>Password</b></td> 
                        <td><b>User Name</b></td> 
                        <td><b>Gender </b></td>
                        <td><b>City</b></td>
                        <td><b>Active Status</b></td>
                    </tr>
                        <?php
                        $sql="SELECT sno, email, password, name, gender, city, activestatus From reguser ORDER BY sno DESC";
                        //die($sql);
                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc())
                        {
                            echo"<tr>";
                            echo"<td><a href=userdetail.php?sno=" . $row["sno"] . ">" .  $row["email"] . "</a></td>";
                            echo"<td>" . $row["password"] . "</td>";
                            echo"<td>" . $row["name"] . "</td>";
                            echo"<td>" . $row["gender"] . "</td>";
                            echo"<td>" . $row["city"] . "</td>";
                            echo"<td>";
                            if($row["activestatus"] == 1)
                                echo "Active";
                            else
                                echo "In-Active";       
                                
                            echo"</td></tr>";

                           
                        }
                        ?>

                    
                </table>
                
            </td>
        </tr>
    </table>
    <?php
    $conn->close();
    ?>
</body>
</html>