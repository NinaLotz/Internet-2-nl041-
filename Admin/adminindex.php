<?php include("../config.ini")?>
<?php include('../nav.inc'); ?>


<!DOCTYPE html>
<html>
    <head>
        <title>Say YES!</title>
    </head>
    <body>

            <h1>I Say YES! to...</h1>
            <br>
            <table>
                <th>ID</th>
                <th>Phrase</th>
                <?php
                    $link = mysqli_connect("localhost", "root", "",    "phrases");
                    if (isset($_GET['delete-id'])){
                        $db_query = "DELETE FROM `phrases` WHERE `ID` = " . $_GET['delete-id'] ;
                        $delete_result = $link->query($db_query);     
 
                    } 
                    
                    $stmt = "SELECT * FROM `phrases`";
                    $result = $link->query($stmt);

                if ($result->num_rows > 0){
                    while ($row = mysqli_fetch_row($result)){
                    echo "<tr>\n";
                    echo "<td>" . $row[0] . "</td>\n";
                    echo "<td>" . $row[1] . "</td>\n";
                    echo "<td>" . $row[2] . "</td>\n";
                    echo "<td><a href='?delete-id=" . $row[0] . "'>delete</a></td>";
                    echo "<td><a href='phrase_edit.php?edit-id=" . $row[0] . "'>edit</a></td>";
                    echo "</tr>";
                    }
                }
                else {
                    echo "<tr><td colspan='2'>No data found</td></tr>";
                }
                ?>
            </table>
    
  
    
    </body>

</html>