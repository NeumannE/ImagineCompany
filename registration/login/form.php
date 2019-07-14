<form method = 'post' action='index.php'>
	<?php include('../errors.php'); ?>
	
	User name:<br>
    <input type='text' name='username' value = "<?php echo $username ?>"><br>
	
    User password:<br>
    <input type='password' name='password' <?php if(!empty($password)) { ?> autofocus <?php } ?>><br>
	
    Not yet a member? <a href='../register/index.php'>Sign up</a>
    <br>
    <br>
    <button class = 'button' name = 'login_user'>
        <span>Login</span>
    </button>
</form>