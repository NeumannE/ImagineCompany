<?php include('../server.php'); ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="generator" content="PSPad editor, www.pspad.com">
    <link rel = "stylesheet" type= "text/css" href="../../css/main_styles.css">
    <link rel = "stylesheet" type= "text/css" href="../../css/form_styles.css">
    <link rel = "stylesheet" type= "text/css" href="../../css/content_styles.css">
    <title>Web/Computers/Company</title>
    <link rel="shortcut icon" href="../../img/web_design_icon.ico" type="image/x-icon">
  </head>
  <body>
<!-- div pro cele tělo -->  
    <div id = "divbody">
<!-- logo -->    
      <div id = "logo">
        <h1>Imagine<br>Company</h1>
      </div>
<!-- menu --> 
    <div class="topnav" id = "mytopnav">
      <a href="../../index.php">Home</a>
      <hr>
      <a href="../../services/index.php">Our services</a>
      <a href="../../news/index.php">News</a>
      <a href="../../blog/index.php">Blog</a>
      <div class="topnav-right" id = "mytopnav-right">
      <hr>
        <a class="active" href="../login/index.php">Join</a>
        <a href="../../contact/index.php">contact</a>
      </div>
       <a href="javascript:void(0); "class="icon" onclick="myfunction()">
		 || 
	    </a>
    </div>
<!-- obsah -->
    <div id = "main_content">
      <!-- forms -->        
      <form method="post" action="index.php">
      <?php include('../errors.php'); ?>
      Username:<br>
      <input type="text" name="username" value="<?php echo $username; ?>">
      <br>
      Password(min 8 char):
      <br>
      <input type="password" name="password_1">
      <br>
      Verify password:
      <br>
      <input type="password" name="password_2">
      <br>
      E-Mail:
      <br>
      <input type="email" name="email" value="<?php echo $email; ?>"><br>
      <br>
      Already a member? <a href="../login/index.php">Log in</a>
      <!-- tlacitko -->
      <button class="button" name="reg_user">
        <span>Register</span>
      </button>
      
    </form>
    

<!--FOOTER-->
		<?php require_once '../../include/footer.php'; ?>	
