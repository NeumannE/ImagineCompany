<?php

include('db_forum.php');

// ověření id v url
if (isset($_GET['id']) && is_numeric($_GET['id'])){
	$id = $_GET['id'];
	$result = mysqli_query($db, "SELECT * FROM comments WHERE id='$id'");
	mysqli_query($db,"DELETE FROM comments WHERE id=$id");
	
	//odkaže zpět pod příspěvek kde jsme byli
	
	$row = mysqli_fetch_array($result);
	$post = $row['post'];
	header("location: post.php?id=$post");
}
?>