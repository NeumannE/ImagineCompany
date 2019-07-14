<?php session_start(); ?>
<?php include('../../include/logout.php');?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="generator" content="PSPad editor, www.pspad.com">
    <link rel = "stylesheet" type= "text/css" href="../../css/main_styles.css">
    <!--<link rel = "stylesheet" type= "text/css" href="../../css/form_styles.css"> -->
    <link rel = "stylesheet" type= "text/css" href="../../css/content_styles.css">
	<link rel = "stylesheet" type= "text/css" href="../../css/news_styles.css">
    <title>Web/Computers/Company</title>
    <link rel="shortcut icon" href="../../img/web_design_icon.ico" type="image/x-icon">
  </head>
  <body>
<!-- div pro cele tělo -->  
    <div id = "divbody">
<!-- logged in user information -->
<?php include('../../include/user_info.php'); ?>
<!-- logo -->    
      <div id = "logo">
        <h1>Imagine<br>Company</h1>
      </div>
<!-- menu --> 
    <div class="topnav" id="mytopnav">
      <a href="../../index.php">Home</a>
      <hr>
      <a href="../../services/index.php">Our services</a>
      <a href="../../news/index.php">News</a>
      <a href="../../blog/index.php">Blog</a>
      <div class="topnav-right" id="mytopnav-right">
      <hr>
        <a class="active" href="index.php"><?php echo $nav ?></a>
        <a href="../../contact/index.php">contact</a>
      </div>
      <a href="javascript:void(0); "class="icon" onclick="myfunction()">
		 || 
	    </a>
    </div>
<!-- obsah -->
<div id = "main_content">
<?php if($_SESSION['role'] == 1){
		$dbservername = "localhost";
  		$dbusername   = "neumanne99";
  		$dbpassword   = "Marbax5683";
  		$dbname       = "registration";
  		$db = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
?>
<?php 

	$orderby = "id";
	$order = "asc";
	
	if(isset($_GET['orderby'])){
		$orderby = $_GET['orderby'];	
	}
	if(!empty($_GET['order'])) {
		$order = $_GET['order'];
	}
	
	$nextidorder = "asc";
	$nextemailorder = "asc";
	$nextstatusorder = "desc";
	$nextusernameorder = "asc";
	
	if($orderby == "username" and $order == "asc") {
		$nextusernameorder = "desc";
	}
	if($orderby == "id" and $order == "asc") {
		$nextidorder = "desc";
	}
	if($orderby == "banned" and $order == "desc") {
		$nextstatusorder = "asc";
	}
	if($orderby == "email" and $order == "asc") {
		$nextemailorder = "desc";
	}

	$result = mysqli_query($db, "SELECT * FROM users ORDER BY ".$orderby." ".$order); ?>
	
	<form method = "POST" action = "" style = "width: 250px; ">
		<span>Search username</span>
		<input type = "text" name = "username">
		<button name = "search">Search</button>
	</form>
	
	<?php
	if(isset($_POST['search'])){
		$username = $_POST['username'];
		if($username != ""){
			$result = mysqli_query($db, "SELECT * FROM users WHERE username = '$username'");
		}
	}
	?>

	<table id = "users">	
	<tr>	
		<th><a href = "review.php?orderby=username&order=<?php echo $nextusernameorder;?>">Username</a></th>
		<th><a href = "review.php?orderby=email&order=<?php echo $nextemailorder;?>">Email</a></th>
		<th><a href = "review.php?orderby=id&order=<?php echo $nextidorder;?>">ID</a></th>
		<th><a href = "review.php?orderby=banned&order=<?php echo $nextstatusorder;?>">Status</a></th>
		<th></th>
		<th></th>	
	</tr>	
<?php while($row = mysqli_fetch_array($result)) { ?>	
	<tr>	
		<td> <?php echo $row['username']; ?> </td>		
        <td> <?php echo $row['email']; ?> </td>
		<td> <?php echo $row['id']; ?> </td>	
		<td> <?php if($row['banned'] == 1){echo "Banned";} ?> </td>	
		<td style = "text-align: center; width: 150px;"><a href = "ban.php?id=<?php echo $row['id']; ?>">Ban</a></td>
		<td style = "text-align: center; width: 150px;"><a href = "unban.php?id=<?php echo $row['id']; ?>">Unban</a></td>
	</tr>		
<?php } ?>
</table>
<?php } ?>
<!--FOOTER-->
	<?php require_once '../../include/footer.php'; ?>	