<div id = "user_info">
    <?php  if (isset($_SESSION['username'])) : ?>   
        User:
          <strong>
            <?php
             echo $_SESSION['username'];
             $nav = "Acoount";
             ?>     
          </strong><br>       
        <a href="index.php?logout='1'">logout</a> 
    <?php endif ?>
  </div>