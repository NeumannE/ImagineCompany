<?php session_start(); ?>
<?php include('../include/logout.php');?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<!--NEWS-->
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="generator" content="PSPad editor, www.pspad.com">
    <link rel = "stylesheet" type= "text/css" href="../css/main_styles.css">
    <link rel = "stylesheet" type= "text/css" href="../css/content_styles.css">
    <link rel = "stylesheet" type= "text/css" href="../css/news_styles.css">
    <title>Web/Computers/Company/Post</title>
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
		

    <?php
    include('db_forum.php'); 
	if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0){
      	$id = $_GET['id'];
    }?>
<!-- obsah/funkce -->
<div id="main_content">
	
	<a href="index.php"><img src="../img/arrowback.png" height="50px" width="50px" alt="Add Discussion"></a>
	
	<?php if(isset($_SESSION['username'])){
		if($_SESSION['ban'] == 0){
	?>
  		<a href="newcomment.php?id=<?=$id?>"><img src="../img/add.png" height="50px" width="50px" alt="Add Discussion"></a>
	<?php }}?>


	<div class = "card" style="text-align: center;">

		<?php $result = mysqli_query($db, "SELECT * FROM posts WHERE id='$id'"); 
		$row = mysqli_fetch_array($result);
		echo "<h2>" . $row['postname'] . "</h2>";
		echo $row['byuser'];

		?>


	</div>
	<hr>
	<?php
		$result = mysqli_query($db, "SELECT * FROM comments WHERE post='$id' ORDER BY id DESC");
		while($row = mysqli_fetch_array($result)) { 
	?>
			<div class = "card">
        		<div class = "id">
          			<?php echo $row['id'];?>
        		</div>
        		<div class = "byuser">
          			<?php echo $row['byuser'];?> 
        		</div>
        		<div class = "title">
          			<?php echo $row['text'];?> 
          		</div>
				<div class="date">
          			<?php echo htmlspecialchars($row['date']);?>
          		</div>

          		<?php if(isset($_SESSION['username'])){ ?>
          			<?php if($row['byuser'] == $_SESSION['username'] || $_SESSION['role'] == 1 ){ 
				if($_SESSION['ban'] == 0){ ?>  
        				<div class="functions">
          					<?php echo '<a href="editcomment.php?id=' . $row['id'] . '"><img src="../img/edit.png" height="30xp" width="30px" alt="Add_button"></a>';?>

          					<?php echo '<a href="deletecomment.php?id=' . $row['id'] . '" onclick="return confirmdelete()"><img src="../img/delete.png" height="30xp" width="30px" alt="delete_button"></a>' ?>
          				</div>
				<?php }}} ?>
        	</div>
    <?php } ?>  



</div>
<!--FOOTER-->
	<?php require_once '../include/footer.php'; ?>