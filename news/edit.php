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
<div id="divbody">
<div id="main_content">
<?php
	//editovací formulář
	function renderForm($id, $title, $text, $error)
	{
?>

<?php
	// vypsaní erroru
	if ($error != ''){
		echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
	}
?>

	<form action="" method="post">
		<input type="hidden" name="id" value="<?php echo $id; ?>"/>
		<div>
			
			<strong>Title:</strong>
				<input type="text" name="title" value="<?php echo $title; ?>"/><br/>

			<strong>Text:</strong>
				<textarea name="text" cols="60" rows="20"><?php echo htmlspecialchars($text); ?></textarea><br/>

			<input type="submit" name="submit" value="Submit">
			<input type="submit" name="cancel" value="Cancel">
		</div>
	</form>
</div>
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
//připojení do databáze
include('db_conn.php');

// po potvrzení
if (isset($_POST['submit'])){

	// ověření validního ID
	if (is_numeric($_POST['id'])){

		// get form data, making sure it is valid
		$id = $_POST['id'];
		$title = mysqli_real_escape_string($db,htmlspecialchars($_POST['title']));
		$text = mysqli_real_escape_string($db,htmlspecialchars($_POST['text']));

		// ověření vyplnění
		if ($title == '' || $text == ''){
			$error = 'Please fill in all required fields!';

			//zobrazení formuláře s errorem
			renderForm($id, $title, $text, $error);
		}
		else{
		$date = date('Y-m-d h:i:s');
		// ulozeni do databaze
		mysqli_query($db,"UPDATE posts SET title='$title', text='$text', date2='$date' WHERE id='$id'");
		header('Location: index.php');
		}
	}
	else{

	// pokud není id validní
	echo 'Error!';
	}
}
else{
//nepotvrzený formulář

//získání ID z URL
if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0){

	$id = $_GET['id'];
	$result = mysqli_query($db, "SELECT * FROM posts WHERE id='$id'");
	$row = mysqli_fetch_array($result);

	// ověření existence řádku
	if($row){

		// get data from db
		$title = $row['title'];
		$text = $row['text'];

		// zobrazí formulář
		renderForm($id, $title, $text, '');
	}
	else{	
		echo "Ždáný výsledek";
	}
}
else{
	echo 'Příspěvek nenalezen';
}
}
if(isset($_POST['cancel'])){
	header('location: index.php');
}
?>