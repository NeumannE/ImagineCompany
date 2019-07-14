<?php session_start(); ?>
<?php include('include/logout.php');?>
<!--HOMEPAGE-->
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="generator" content="PSPad editor, www.pspad.com">
    <link rel = "stylesheet" type = "text/css" href="css/main_styles.css">
    <link rel = "stylesheet" type = "text/css" href="css/content_styles.css">
    <title>Web/Computers/Company/HomePage</title>
    <link rel="shortcut icon" href="img/web_design_icon.ico" type="image/x-icon">
  </head>
  <body>
<!-- div pro cele tělo -->
    <div id = "divbody">
		
<!-- logged in user information -->
<?php include('include/user_info.php'); ?>
		
<!-- logo -->
      <div id = "logo">
        <h1>Imagine<br>Company</h1>
      </div>  
<!-- menu -->      
    <div class="topnav" id = "mytopnav">
      <a class="active" href="index.php">Home</a>
      <hr>
      <a href="services/index.php">Our services</a>
      <a href="news/index.php">News</a>
      <a href="blog/index.php">Blog</a>
      <div class="topnav-right" id = "mytopnav-right">
	      <hr>
        <a href="registration/login/index.php"><?php echo $nav ?></a>
        <a href="contact/index.php">contact</a>
      </div>
	  <!-- tlacitko v menu -->
	    <a href="javascript:void(0); "class="icon" onclick="myfunction()">
		 || 
	    </a>
		
		
    </div>
<!-- obsah --> 
<div id = "main_content">  
      <div class="leftcolumn">
        <div class="card">
          <h2>Welcome on our website!</h2>
          <h5>Computer & Webmakers mages</h5>
          <div class="img" >
			<img src="img/obrazek.png">
		  </div>
          <p>web developement for everyone</p>
          
        </div>
        <div class="card">
          <h2>TITLE</h2>
          <h5>podtitle tatitle</h5>
          <div class="fakeimg" style="height:200px;">Image</div>
          <p>Some text..</p>
          <p>Sunt in culpa qui officia deserunt mollit anim id est laborum consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.</p>
        </div>
      </div>
      <div class="rightcolumn">
        <div class="card">
          <h2>About Us</h2>
          	<div class="img">
				<img src="img/creative.jpg">
			</div>
          <p>
            We enjoy to be creative!
          </p>
        </div>
		  
        <!--Novinka -->
        <div class="card">
          <h2>Latest News!</h2>
          <hr>
          <?php 
          include('news/db_conn.php');
          $result = mysqli_query($db, "SELECT * FROM posts ORDER BY id DESC");
          $row = mysqli_fetch_assoc($result);
          echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
          echo "<p>" . htmlspecialchars($row['text']) . "</p>";
          ?>
        </div>
		  
        <div class="card">
          <a href="contact/"> <h2>Follow Us!</h2></a>
          	<p>Facebook..</p>
			<p>Instagram..</p>
        </div> 
      </div>
     </div>
    
<!--FOOTER-->
	<?php require_once 'include/footer.php'; ?>	
		