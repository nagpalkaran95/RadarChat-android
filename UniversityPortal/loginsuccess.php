<?php
	// Check if session is not registered, redirect back to main page. 
	session_start();
	if(!isset($_SESSION['username'])) {
		header("location:index.php");
	}
?>

<html>
<body>
	</br> </br>
	<?php
		//print_r($_SESSION);
	?>

	</br> </br>
	Login Successful
	</br> </br>
	Welcome <?php echo $_SESSION['username']; ?>
	</br> </br>
	<a href="index.php">Click here to LOGOUT</a> 
</body>
</html>