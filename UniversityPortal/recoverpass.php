<?php
session_start();
$_SESSION['enroll']=$_POST['enroll'];
?>
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
	$host="localhost"; 		// Host name 
	$username="root"; 		// Mysql username 
	$password=""; 			// Mysql password 
	$db_name="university"; 		// Database name 
	$tbl_name="student"; 	// Table name 
	
	$connection = mysqli_connect('localhost', 'root', '', 'university');
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
 
	$myusername=$_POST['enroll'];  

	// To protect MySQL injection 
	$myusername = stripslashes($myusername);
	$myusername = mysqli_real_escape_string($connection, $myusername);
	$sql="SELECT * FROM $tbl_name WHERE stu_id='$myusername'";

	$result=mysqli_query($connection, $sql);
	$row = $result->fetch_array(MYSQL_BOTH);
	/*
	if($row['stu_id']!=$_POST['enroll'])
	{	
		echo '<script language="javascript">';
		echo 'alert("Wrong Enrollment Number!")';
		echo '</script>';
		header('Location: '.$_SERVER['PHP_SELF']);
		die;
	}
	*/
?>


</head>
<body background="background.jpg">
	<img class="banner" src="banner.jpg">
	<img class="bannerlow" src="bannerlow.jpg">
	<img class="jiitlogo" src="logo.png">
	<img class="bar" src="bar2.png">
	<table class="homebar">
		<tr>
			<th><a href=""><font face="times new roman" size="4" color="white">STUDENT</font></a></th>
			<th><a href="employeelogin.php"><font face="times new roman" size="4">EMPLOYEE</font></a></th>
			<th><a href="guestlogin.php"><font face="times new roman" size="4">GUEST</font></a></th>
			<th><a href="contact_us.php"><font face="times new roman" size="4">CONTACT US</font></a></th>
		</tr>
	</table><br><br>
	<table class="login">
		<tr>
			<td>
				<form name="recover" id="recover" action="checkans.php" method="post">
				<input type="text" name="enroll" value="<?php echo $_POST['enroll']; ?>" readonly>
					<p class="textbox">
					<font size="5px">Question : <?php echo $row["ques"];?> </font>
					<br>
					<font size="5px">Answer &nbsp&nbsp </font><input type="text" name="ans" id="ans" class="resizedTextbox" placeholder="Answer" required><font color="red">&nbsp*</font><br>
					</p>
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="submit" name="submit" value="SUBMIT">
					<input type="reset" name="reset" value="RESET">
					<br><br><br><br>
					
				</form>
			</td>
		</tr>		
	</table>
	<hr>
	<p align="right">
		<font color="white">
			Jiitcampuscare.com@2015. Website Designed & Developed by ARKU Studio. &nbsp&nbsp
			<img src="reddot.png">
			<img src="bluedot.png">
			<img src="yellowdot.png">
			<img src="greendot.png">
		</font>
	</p>	
</body>
</html>