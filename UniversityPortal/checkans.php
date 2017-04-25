<html>
<head>
<title>
Campus Care
</title>
<link rel="stylesheet" type="text/css" href="banner.css">
<link rel="stylesheet" type="text/css" href="homebar.css">
<style type="text/css">
	.resizedTextbox {
			width: 130px;
			height: 30px;
			padding: 3px;
	}

	p.textbox {
		line-height: 200%;
	}

	.bar{
		margin-left: -60px;
		margin-top: 20px;
		position: absolute;
		z-index: -3;
	}

	table.login{
		margin-left: 460px;
		margin-top: 70px;
	}

</style>
<?php
    session_start();
	$host="localhost"; 		// Host name 
	$username="root"; 		// Mysql username 
	$password=""; 			// Mysql password 
	$db_name="university"; 		// Database name 
	$tbl_name="student"; 	// Table name 

	// Connect to server and select database.
	$connection = mysqli_connect('localhost', 'root', '', 'university');
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	// username and password sent from form 
	$answer=$_POST['ans']; 
	$myusername=$_POST['enroll'];
	// $mypassword=$_POST['pass']; 

	// To protect MySQL injection 
	$myusername = stripslashes($myusername);
	$answer = stripslashes($answer);
	$myusername = mysqli_real_escape_string($connection, $myusername);
	$answer = mysqli_real_escape_string($connection, $answer);
	$sql="SELECT * FROM $tbl_name WHERE stu_id='$myusername'";

	$result=mysqli_query($connection, $sql);
	$row = $result->fetch_array(MYSQL_BOTH);
	//if($answer==$row['ans'])
	//	echo $row["password"];
?>
</head>
<body background="background.jpg">
	<img class="banner" src="banner.jpg">
	<img class="bannerlow" src="bannerlow.jpg">
	<img class="jiitlogo" src="logo.png">
	<img class="bar" src="bar2.png">
	<table class="homebar">
		<tr>
			<th><a href="studentlogin.php"><font face="times new roman" size="4">STUDENT</font></a></th>
			<th><a href="employeelogin.php"><font face="times new roman" size="4">EMPLOYEE</font></a></th>
			<th><a href="guestlogin.php"><font face="times new roman" size="4">GUEST</font></a></th>
			<th><a href="contact_us.php"><font face="times new roman" size="4">CONTACT US</font></a></th>
		</tr>
	</table><br><br><br><br>
	<?php
	if($answer==$row['ans'])
		echo "<b><center>Your password : ".$row["password"]."</b></center>";
	?>
	</body>
</html>
