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
                <h2>Sub Category List</h2>
                <table cellspacing=2 cellpadding=5 border=1>
                    <tr>
                        <td><b>Sub Category Name</b></td>
                        <td><b>Category </b></td>
                        <td><b>Status</b></td>
                    </tr>
                        <?php
                        $sql="SELECT * FROM subcategorydetail ORDER BY subcategoryname";

                        $result = $conn->query($sql);
                        while($row = $result->fetch_assoc())
                        {
                            echo"<tr>";
                            echo"<td><a href=subCategoryForm.php?subCatId=" . $row["subcategoryid"] . ">" .  $row["subcategoryname"] . "</a></td>";
                            

                            $sql1="SELECT categoryname FROM catagorydetail WHERE categoryid=" . $row["categoryid"];;

                            $result1 = $conn->query($sql1);
                            while($row1 = $result1->fetch_assoc())
                            {
                                echo"<td>" . $row1["categoryname"] . "</td>";

                            }

                            echo"<td>";
                            if($row["activestatus"] == 1)
                                echo "Active";
                            else
                                echo "In-Active";       
                                
                            echo"</td></tr>";
                            }

                        ?>

                    
                </table>
                <a href=subCategoryForm.php?subCatId=0>Add Sub-Category</a>
            </td>
        </tr>
    </table>
    <?php
    $conn->close();
    ?>
</body>
</html>