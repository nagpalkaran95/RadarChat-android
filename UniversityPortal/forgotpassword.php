<?php 
session_start();

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
	</table><br><br>
	<table class="login">
		<tr>
			<td>
				<form name="renewpass" id="renewpass" action="recoverpass.php" method="post">
					<p class="textbox">
					<font size="5px">Enrollment No&nbsp </font><input type="text" name="enroll" id="enroll" class="resizedTextbox" placeholder="Enrollment Number" required><font color="red">&nbsp*</font><br>
					</p>
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="submit" name="submit" value="SUBMIT">
					<input type="reset" name="reset" value="RESET">		
					<br><br><br><br>
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <u><font size="4"><a href="index.php">Go back to home page</font></u></a>
				</form>
			</td>
		</tr>		
	</table>
</body>
</html>