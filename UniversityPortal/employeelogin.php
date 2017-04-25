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
	<a href="index.php"><img class="jiitlogo" src="logo.png"></a>
	<img class="bar" src="bar2.png">
	<table class="homebar">
		<tr>
			<th><a href="studentlogin.php"><font face="times new roman" size="4">STUDENT</font></a></th>
			<th><a href=""><font face="times new roman" size="4" color="white">EMPLOYEE</font></a></th>
			<th><a href="guestlogin.php"><font face="times new roman" size="4">GUEST</font></a></th>
			<th><a href="contact_us.php"><font face="times new roman" size="4">CONTACT US</font></a></th>
		</tr>
	</table><br><br>
	<table class="login">
		<tr>
			<td>
				<form name="login" id="login" action="checklogin_emp.php" method="post">
					<p class="textbox">
					<font size="5px">
					Institute     
					</font>
					  <select class="resizedTextbox">
					  <option value="j128">J128</option>
					  </select><font color="red">&nbsp*</font><br>
					<font size="5px">
					Member Type &nbsp    
					</font>
					  <select class="resizedTextbox" id="MEMBER_TYPE" name="MEMBER_TYPE">
					  <option value="employee">EMPLOYEE</option>
					  </select><font color="red">&nbsp*</font><br>
					<font size="5px">Enrollment No&nbsp </font><input type="text" name="enroll" id="enroll" class="resizedTextbox" placeholder="Enrollment Number" required><font color="red">&nbsp*</font><br>
					<font size="5px">Password/Pin &nbsp&nbsp </font><input type="password" name="pass" id="pass" class="resizedTextbox" placeholder="Password" required><font color="red">&nbsp*</font><br>
					</p>
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="submit" name="submit" value="SIGN IN">
					<input type="reset" name="reset" value="RESET">
					<br><br><br><br>
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <u><font size="4"><a href="forgotpassword.php">Forgot Password?</font></u></a>
					<br><br>
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <u><font size="5"><a href="signup.php">New User? Sign Up!</font></u></a>
				</form>
			</td>
		</tr>		
	</table>
	<hr>
	<p align="right">
		<font color="white">
			Jiitcampuscare.com@2015. Website Designed & Developed by KAUR Studio. &nbsp&nbsp
			<img src="reddot.png">
			<img src="bluedot.png">
			<img src="yellowdot.png">
			<img src="greendot.png">
		</font>
	</p>
</body>
</html>