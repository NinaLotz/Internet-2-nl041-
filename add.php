<?php include("config.ini"); ?>

<?php $text =$_GET["Adjektive"]." ".$_GET["Farben"]." ".$_GET["Tiere"]."\n"; ?>

<?php   $conn = new mysqli("localhost", "root", "", "phrases");
        $sql = "INSERT INTO phrases (id, phrase, recipient)
                VALUES (NULL, '". $text. "', 'email')";
        if ($conn->query($sql) === TRUE) {
            echo "Neuer Eintrag verfasst!";
            }
            else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            }
?>

<?php if ($mailfun == true){ 
        if (isset($_GET['email'])){
            $to      = urldecode($_GET['email']);
            $subject = 'I say YES! to...';
            $message = $text;
            $headers = 'From: internet2@hdmy.de' . "\r\n" .
                          'Reply-To: internet2@hdmy.de' . "\r\n" .
                          'X-Mailer: PHP/' . phpversion();

            $mailSuccess = mail($to, $subject, $message, $headers);        
            if (!$mailSuccess){
                $message .= "Mail konnte nicht versendet werden";
                      }
            else {
                $message .= "Mail wurde versendet";
                }
             }
            }
?>


<!DOCTYPE html>
<html>
    <head> 
        <title> Phrase Generator</title>
    </head>
    
    <body>
        <?php include('nav.inc'); ?>
        
        
        
            <form action="index.php" method="get">

                    Begrüßung:<br> 
                    <select name="Anrede" size="1">
                    <option>Guten Morgen</option>
                    <option>Mahlzeit</option>
                    <option>Guten Abend</option>
                    <option>Gute Nacht</option> <br>
                    </select>
                    <br>
                    Name:<br> 
                    <input type="text" name="name">
                    <br>
                    Nachname: <br> 
                    <input type="text" name="nachname">     
                    <br>
                    <?php
                    if ($mailfun == true){
                    ?>
                        <div class="form-group">
                            <label for="email">Diese Nachricht senden an: </label> <br>
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                        </div>    
                    <?php    
                    }
                    ?>
                    <br>

                    <h1>I Say YES! to... </h1>

                    <select name="Adjektive" size="1">
                        <option>Kleinen</option>
                        <option>Großen</option>
                        <option>Dicken</option>
                        <option>Dünnen</option>
                    </select>

                    <select name="Farben" size="1">
                        <option>Roten</option>
                        <option>Blauen</option>
                        <option>Gelben</option>
                        <option>Grünen</option>
                    </select>

                    <select name="Tiere" size="1">
                        <option>Giraffen</option>
                        <option>Zebras</option>
                        <option>Hunden</option>
                        <option>Katzen</option>
                    </select>

                    <br>
                <input type="submit" value="Los geht´s!">
            </form>
   
    </body>
</html>