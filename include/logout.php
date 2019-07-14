<?php 
	$nav = "Join";		//změna nazvu v menu
  	if(isset($_GET['logout'])) {
    	session_destroy();
		session_unset();
    	header("location: http://imaginecompany.mzf.cz/registration/login/index.php");	  
    	$nav = "Join";	//změna nazvu v menu
	}

	//expire session
	if (isset($_SESSION["LAST_ACTIVITY"]) && (time() - $_SESSION["LAST_ACTIVITY"] >= 550)) {
    	session_destroy();  
    	session_unset();
	}
	if(isset($_SESSION["username"])){
		$_SESSION['LAST_ACTIVITY'] = time();
 		header("Refresh: 600; http://imaginecompany.mzf.cz/registration/login/index.php");
	}
	
?>