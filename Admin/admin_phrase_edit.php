<?php include("../config.ini"); ?>
<?php $update_result = 0;
      $link = mysqli_connect("localhost", "root", "", "phrases");
      
      if (isset($_GET['btn-save'])){
        $db_query = "UPDATE `phrases` SET `text` = '" . $_GET['phrase'] . "' WHERE `ID` = " . $_GET['edit-id'] ;
          
        $result = $link->query($db_query);     
      }
      $db_query = "SELECT * FROM `phrases` WHERE `ID` = " . $_GET['edit-id'] ;
      $result = $link->query($db_query); 
?>


<!DOCTYPE html>
<html>
    <head> 
    </head>
    
    <body>
        <?php include('../nav.inc'); ?>
         <?php if ($update_result == 1){ ?>
            <div class="alert alert-primary message-box" role="alert">
              Update Success! 
              <a href="adminindex.php">Back to dashboard</a>
            </div>
         <?php } ?>

        
        
                <br>
                
                <h1>Edit Now!</h1>
            
                <form>
                    <input type="hidden" name="edit-id" value="<?php echo $_GET['edit-id']?>" >
                    
                     <input type="text" name="phrase" class="form-control" value="<?php echo $text ?>"></input> 
        
                    <button type="submit" name="btn-save" value="1">Update</button>                
                
                </form>
    </body>
</html>