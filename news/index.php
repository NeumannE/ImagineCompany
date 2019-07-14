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
<!-- obsah -->

<?php 
include('db_conn.php');
$result = mysqli_query($db, "SELECT * FROM posts ORDER BY id DESC");
?>

  <div id ="main_content">
    <?php if(isset($_SESSION['role'])){ ?>
    <?php if($_SESSION['role'] == 1){ ?>
      <a href="new.php"><img src="../img/add.png" height="50px" width="50px" alt="Add_button"></a>
    <?php } } ?>


    <?php while($row = mysqli_fetch_array( $result )) { ?>
      <div class = "card">
        <div class = "id">
          <?php echo $row['id'];?>
        </div>
        <div class = "title">
          <h2><?php echo $row['title'];?> </h2>
        </div>
        <div class="date1">
          <?php echo htmlspecialchars($row['date1']);?>
        </div>
        <div class = "text">
          <?php echo htmlspecialchars($row['text']);?>
        </div>
        <div class="date2"> 
          <?php echo htmlspecialchars($row['date2']);?>
        </div>
        <?php if(isset($_SESSION['role'])){ ?>
        <?php if($_SESSION['role'] == 1){?>
        <div class="functions">
          <?php echo '<a href="edit.php?id=' . $row['id'] . '"><img src="../img/edit.png" height="30xp" width="30px" alt="Add_button"></a>';?>

          <?php echo '<a href="delete.php?id=' . $row['id'] . '" onclick="return confirmdelete()"><img src="../img/delete.png" height="30xp" width="30px" alt="delete_button"></a>' ?>
          </div>
          <?php } } ?>
        
      </div>
    <?php } ?>

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
