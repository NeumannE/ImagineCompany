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
<!-- obsah/funkce -->
<div id="divbody">
<div id="main_content">
<?php
  //editovací formulář
  function renderForm($id, $text, $error)
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
      
      <strong>Text:</strong>
        <input type="text" name="text"/><br/>

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
include('db_forum.php');

// po potvrzení
if (isset($_POST['submit'])){

  if(is_numeric($_GET['id'])){
    $id = $_GET['id'];
    $text = mysqli_real_escape_string($db,htmlspecialchars($_POST['text']));

    if($text == ""){
      $error = "Comment without comment?! why ?!";
      renderForm($id,'',$error);
    }
    else{
      // uložení do db
      $date = date('Y-m-d h:i:s');
      $byuser = $_SESSION['username'];
      if($_SESSION['role'] == 1){
        $byuser = $_SESSION['username'] . "(Administrator)";
      }
      mysqli_query($db,"INSERT comments SET text='$text', date='$date', byuser='$byuser', post='$id'");

      // po uložení zobrazí diskuzi
      header("location: post.php?id=$id");
    }
  }  
}
else{
  if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0){
    $id = $_GET['id'];
  }
  renderForm('$id','','');
}



if(isset($_POST['cancel'])){
  header("location: post.php?id=$id");
}
?>