
<?php
	// Check if session is not registered, redirect back to main page. 
	session_start();
	if(!isset($_SESSION['username'])) {
		header("location:index.php");
	}
?>

<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css">
	<title>Welcome <?php echo $_SESSION['Teacher_name'];?>
	</title>
</head>
	<body bgcolor="%EEFFDD">
		<img class="banner" src="banner.jpg">
		<img class="bannerlow" src="bannerlow.jpg">
		<img class="jiitlogo" src="logo.png">
		
		<p align="right">Welcome  <?php echo $_SESSION['Teacher_name'];?> <br/>
		<a href="logout.php" align="right">Logout </a></p>
		
		<br/>
		<table align="center" border="5px" class ="table">
			<tr><td><a href="Update_marks.php">View/Update marks</a></td></tr>
			<tr><td><a href="update_Attendance.php">View/Update Attendance</a></td></tr>
			<tr><td><a href="Add_marks.php">Add marks</a></td></tr>
			<tr><td><a href="Add_A.php">Add Attendance</a></td></tr>
		</table>
		
	</body>                                                           
</html>                                                               