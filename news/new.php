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
    <title>Web/Computers/Company/News</title>
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
      <a class="active" href="index.php">News</a>
      <a href="../blog/index.php">Blog</a>
      <div class="topnav-right" id = "mytopnav-right">
      <hr>
        <a href="../registration/login/index.php"><?php echo $nav ?></a>
        <a href="../contact/index.php">contact</a>
      </div>
      <a href="javascript:void(0); "class="icon" onclick="myfunction()">
		 || 
	    </a>
    </div>
<!-- obsah/funkce -->

<?php
	function renderForm($title, $text, $error)
	{
?>


<div id="divbody">
	<div id="main_content">
<form action="" method="post">
	<div>
		<strong>Title:</strong>
			<input type="text" name="title" value="<?php echo $title; ?>"><br/>

		<strong>Text:</strong>
			<textarea name="text"><?php echo $text; ?></textarea><br/>

		<input type="submit" name="submit" value="Submit">
		<input type="submit" name="cancel" value="Cancel">
	</div>
	<?php
	// Zobrazení erroru
	if ($error != ''){
		echo '<div class="error">'.$error.'</div>';
	}
?>
</form>


</div>
<!-- paticka -->
    <div id = "footer">
        <div id = "logo_footer">
          <h3>Imagine<br>Company</h3>
        </div>
      <p>&copy; 2018-<?php echo date("Y");?> Emanuel Neumann</p>
    </div>
    <!----      ---->
   </div>
   <script src = "../js/js_nav.js" type = "text/javascript"></script>



  </body>
</html>

<?php
}

// připojení do databáze
include('db_conn.php');



// po potvrzení
if (isset($_POST['submit'])){
	//vezme data
	$title = mysqli_real_escape_string($db, htmlspecialchars($_POST['title']));
	$text = mysqli_real_escape_string($db, htmlspecialchars($_POST['text']));

	// ověření vyplnění
	if ($title == '' || $text == ''){

		// error message
		$error = 'Please fill in all fields!';

		//pokud je formulář prázdný zobrazíme ho znovu
		renderForm($title, $text, $error);
	}
	else{
		// uložení do db
		$date = date('Y-m-d h:i:s');
		mysqli_query($db,"INSERT posts SET title='$title', text='$text', date1='$date', date2='$date' ");

		// po uložení zobrazí tabulku
		header('location: index.php');
	}
}
else{
//pokud nepotvrdíme 	
renderForm('','','');
}
if(isset($_POST['cancel'])){
	header('location: index.php');
}
?>