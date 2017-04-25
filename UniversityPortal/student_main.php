



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
	<title>Welcome <?php echo $_SESSION['Student_name'];?>
	</title>
</head>
	<body background="1019286_abstract_orange_tiles_background_.jpg">
		<img class="banner" src="banner.jpg">
		<img class="bannerlow" src="bannerlow.jpg">
		<img class="jiitlogo" src="logo.png">
		<p align="right">Welcome  <?php echo $_SESSION['Student_name'];?> <br/>
		<a href="logout.php" align="right">Logout</a></p>
		
		<br/>
		<table align="center" border="0px" class="table">
		<tr><td><a href="view1.php">View Personal Details</a></td></tr>
			<tr><td><a href="view_marks.php">View Marks</a></td></tr>
			<tr><td><a href="view_attendance.php">View Attendance</a></td></tr>
			
		</table>
	</body>
</html>