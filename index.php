<?php include("config.ini")?>

<?php $text =$_REQUEST["Adjektive"]." ".$_REQUEST["Farben"]." ".$_REQUEST["Tiere"]."\n";
    file_put_contents($filename, $text, FILE_APPEND)
    ?>

<?php include('nav.inc'); ?>

<?php
    if(empty($_GET['nachname']))
    { die("Kein Nachname übermittelt");}
    ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Say YES!</title>
    </head>
    
    <body>
        
    
            <?php echo $_GET['Anrede']; ?>
            <?php echo $_GET['name']; ?>
            <?php echo $_GET['nachname']; ?>
            <br>
            <h2>You said Yes! to...</h2>
            <?php echo $text; ?>
            <br>
            <br>
           
            <h1>Others said Yes! to...</h1>
            <table>
                <th>ID</th>
                <th>Phrase</th>
                <?php
                    $link = mysqli_connect("localhost", "root", "",    "phrases");
                    $stmt = "SELECT * FROM `phrases`";
                    $result = $link->query($stmt);

                if ($result->num_rows > 0){
                    while ($row = mysqli_fetch_row($result)){
                    echo "<tr>\n";
                    echo "<td>" . $row[0] . "</td>\n";
                    echo "<td>" . $row[1] . "</td>\n";
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