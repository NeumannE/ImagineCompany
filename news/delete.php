<?php

include('db_conn.php');

// ověření id v url
if (isset($_GET['id']) && is_numeric($_GET['id'])){

	$id = $_GET['id'];
	$result = mysqli_query($db,"DELETE FROM posts WHERE id=$id");
	header("Location: index.php");
}
else{
header("Location:index.php");
}
?>