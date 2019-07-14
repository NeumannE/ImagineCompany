<?php
if (isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0){
	$id = $_GET['id'];
		$dbservername = "localhost";
  		$dbusername   = "neumanne99";
  		$dbpassword   = "Marbax5683";
  		$dbname       = "registration";
  		$db = mysqli_connect($dbservername, $dbusername, $dbpassword, $dbname);
	
		$query = "UPDATE users SET banned='1' WHERE id='$id'";
		mysqli_query($db, $query);
			
	
		$result = mysqli_query($db, "SELECT * FROM users WHERE id='$id'");
		$row = mysqli_fetch_assoc($result);
		$username = $row['username'];
		include('../../blog/db_forum.php');
		$bannedname = "$username(Banned)";
		$query = "UPDATE posts SET byuser = '$bannedname' WHERE byuser='$username'";
		mysqli_query($db, $query);
		$query = "UPDATE comments SET byuser = '$bannedname' WHERE byuser = '$username'";
		mysqli_query($db, $query);
	
	
		
		header('location: review.php'); 
	
	
}

?>