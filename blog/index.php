<?php session_start(); ?>
<?php include('../include/logout.php');?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<!--Blog-->
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="generator" content="PSPad editor, www.pspad.com">
    <link rel = "stylesheet" type= "text/css" href="../css/main_styles.css">
    <link rel = "stylesheet" type= "text/css" href="../css/content_styles.css">
    <link rel = "stylesheet" type= "text/css" href="../css/news_styles.css">
    <title>Web/Computers/Company</title>
    <link rel="shortcut icon" href="../img/web_design_icon.ico" type="image/x-icon">
  </head>
  <body>
<!-- div pro cele tělo -->  
<div id = "divbody">
<!-- logged in user information -->
<?php include('../include/user_info.php'); ?>
<!-- logo -->    
      <div id = "logo">
        <h1>Imagine<br>Company</h1>
      </div>
<!-- menu -->    
    <div class="topnav" id = "mytopnav">
      <a href="../index.php">Home</a>
      <hr>
      <a href="../services/index.php">Our services</a>
      <a href="../news/index.php">News</a>
      <a class="active" href="index.php">Blog</a>
      <div class="topnav-right" id = "mytopnav-right">
      <hr>
        <a href="../registration/login/index.php"><?php echo $nav?></a>
        <a href="../contact/index.php">contact</a>
      </div>
      <a href="javascript:void(0); "class="icon" onclick="myfunction()">
		 || 
	    </a>
    </div>
<!-- obsah -->    
<?php 
  include('db_forum.php');
  $result = mysqli_query($db, "SELECT * FROM posts ORDER BY id DESC");
?>  
<div id="main_content">

<?php if(isset($_SESSION['username'])){
	  if($_SESSION['ban'] == 0){
	?>
  <a href="new.php"><img src="../img/add.png" height="50px" width="50px" alt="Add Discussion"></a>
	<?php 	} 
			else
	  		{
	  			?><div class = "card"> you are banned </div><?php
	  		}	
 		}
		else
		{
			?><div class = "card"> to add topics you need to log in first </div><?php
		}
	?>
	
<?php while($row = mysqli_fetch_array( $result )) { ?>
      <div class = "card">
        <div class = "id">
          <?php echo $row['id'];?>
        </div>
        <div class = "byuser">
          <?php echo $row['byuser'];?> 
        </div>
        <div class = "title">
          <?php echo '<a href="post.php?id=' . $row['id'] . '">  <h2> ' .  $row["postname"] . ' </h2> </a>';?>   		
        </div>

        <div class="date1">
          <?php echo htmlspecialchars($row['date']);?>
			<p>Comments: 
			<?php
			$id = $row['id'];
			$rows = mysqli_query($db, "SELECT * FROM comments WHERE post = '$id'");
			$num_row = mysqli_num_rows($rows);									   
			echo $num_row . "</p>";
			?>
        </div>

        <?php if(isset($_SESSION['username'])){ ?>
          <?php if($row['byuser'] == $_SESSION['username'] || $_SESSION['role'] == 1 ){ 
		  	if($_SESSION['ban'] == 0){
		  ?>  
        <div class="functions">
          <?php echo '<a href="edit.php?id=' . $row['id'] . '"><img src="../img/edit.png" height="30xp" width="30px" alt="Add_button"></a>';?>

          <?php echo '<a href="deletepost.php?id=' . $row['id'] . '" onclick="return confirmdelete()"><img src="../img/delete.png" height="30xp" width="30px" alt="delete_button"></a>' ?>
          </div>
		  <?php }}}?>
        
      </div>
    <?php } ?>  

	
	
	
	
	
</div>  	
<!--FOOTER-->
	<?php require_once '../include/footer.php'; ?>	