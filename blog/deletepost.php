<?php

include('db_forum.php');

// ověření id v url
if (isset($_GET['id']) && is_numeric($_GET['id'])){

	$id = $_GET['id'];
	mysqli_query($db,"DELETE FROM posts WHERE id=$id");
	mysqli_query($db,"DELETE FROM comments WHERE post=$id");
	header("Location: index.php");
}
else{
header("Location:index.php");
}
?>