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
        
            <td width=80%>
                <h2>Order List</h2>
                <table cellspacing=2 cellpadding=5 border=1>
                    <tr>
                        <td><b>Order No</b></td> 
                        <td><b>Order Date</b></td> 
                        <td><b>Customer Name</b></td> 
                        <td><b>City </b></td>
                        <td><b>Order Amount</b></td>
                        <td><b>Pay Method</b></td>
                        <td><b>Order Status</b></td>
                    </tr>
                        <?php
                        $sql="SELECT orderno, orderdate, name, city, orderamt, paymentmode, orderstatus From ordermaster WHERE email='" . $email . "' ORDER BY orderno DESC";
                        //die($sql);
                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc())
                        {
                            echo"<tr>";
                            echo"<td><a href=myorderdetail.php?oId=" . $row["orderno"] . ">" .  $row["orderno"] . "</a></td>";
                            echo"<td>" . $row["orderdate"] . "</td>";
                            echo"<td>" . $row["name"] . "</td>";
                            echo"<td>" . $row["city"] . "</td>";
                            echo"<td>" . $row["orderamt"] . "</td>";
                            echo"<td>" . $row["paymentmode"] . "</td>";
                            echo"<td>" . $row["orderstatus"] . "</td>";

                           echo "</td></tr>";
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