<div class = 'card' style = 'margin-top:65px'>
	<?php
if($_SESSION['ban'] == 1){
			echo "<div style = 'color:red;'>YOUR ACCOUNT HAS BEEN BANNED </div>";
}
		
	?>
	<h2 style = 'margin-bottom: -10px'>User name:</h2> <br>
	<?php echo $_SESSION['username']; ?>
	
	
	<hr style = "margin-top: 50px;">
	
	<h2 style = 'margin-bottom: -10px'>E-mail:</h2> <br>
	<?php echo $_SESSION['email']; ?>
	
	
	
	<hr style = "margin-top: 50px;">
	
	<h2 style = 'margin-bottom: -10px'>Role:</h2> <br>
	<?php 
		if($_SESSION['role'] != 1){
			
			echo "Normal User";
			echo "<hr style = 'margin-top: 50px;'>";
		}
		else{
			echo "Administrator";
			?>
			<hr style = "margin-top: 50px;">
			<a href = "review.php">Review accounts</a>
			<?php
		}
	?>
	
</div>