<?php
$conn = new mysqli("localhost", "root", "", "my_database");

$code = $_GET["code"];

    echo "<select name=subCategoryList>";
 
    $sql1 = "SELECT * FROM subcategorydetail WHERE categoryid=" . $code . " ORDER BY subcategoryname";
    //die($sql1);
    $result1 = $conn->query($sql1);
    while($row1 = $result1->fetch_assoc())
    {
    echo "<option value=" . $row1["subcategoryid"] . ">" . $row1["subcategoryname"] . "</option>";
                            
    }
                        
    echo "</select>";
    $conn ->close();
//echo $sql1;







?>