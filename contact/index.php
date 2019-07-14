<?php session_start(); ?>
<?php include('../include/logout.php');?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="generator" content="PSPad editor, www.pspad.com">
    <link rel = "stylesheet" type= "text/css" href="../css/main_styles.css">
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
      <a href="../blog/index.php">Blog</a>
      <div class="topnav-right" id = "mytopnav-right">
      <hr>
        <a href="../registration/login/index.php"><?php echo $nav ?></a>
        <a class="active" href="index.php">contact</a>
      </div>
      <a href="javascript:void(0); "class="icon" onclick="myfunction()">
		 || 
	    </a>
    </div>
    

<!-- obsah -->    
    
    
    
    
<!--FOOTER-->
	<?php require_once '../include/footer.php'; ?>	