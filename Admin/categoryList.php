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
                <h2>Category List</h2>
                <table cellspacing=2 cellpadding=5 border=1>
                    <tr>
                        <td><b>Category Name</b></td>
                        <td><b>Status</b></td>
                    </tr>
                        <?php
                        $sql="SELECT * FROM catagorydetail ORDER BY categoryname";

                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc())
                        {
                            echo"<tr>";
                            echo"<td><a href=categoryForm.php?CatId=" . $row["categoryid"] . ">" .  $row["categoryname"] . "</a></td>";
                            echo"<td>";
                            if($row["activestatus"] == 1)
                                echo "Active";
                            else
                                echo "In-Active";       
                                
                            echo"</td></tr>";
                        }

                        ?>

                    
                </table>
                <a href=categoryForm.php?CatId=0>Add Category</a>
            </td>
        </tr>
    </table>
    <?php
    $conn->close();
    ?>
</body>
</html>