<html>
<head>
<title>
Campus Care
</title>
<link rel="stylesheet" type="text/css" href="banner.css">
<link rel="stylesheet" type="text/css" href="homebar.css">
<style type="text/css">
	.resizedTextbox {
			width: 150px;
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

<script type="javascript">
	function forgot()
	{
		alert("Admin has received your information. Kindly wait for a mail!");	
	}
	function validation()
	{
		var x=document.forms["signup"]["enroll"].value;
		if(x.length>10 || x.length<10 || isNaN(x))
			alert("ID must be digits and of 10 length!");
		var y=document.forms["signup"]["pass"].value;
		if(y.length>15)
			alert("Password can be atmost 15 characters long!");	
		var z=document.forms["signup"]["address"].value;
		if(z=="" || z==NULL)
			alert("Address should contain a valid value!");
		var a=document.forms["signup"]["phone"].value;
		if(a.length>10 || a.length<10 || isNaN(a))
			alert("phone no should be of the proper format!");
		var b=document.forms["signup"]["ques"].value;
		if(b=="" || b==NULL)
			alert("Security Question should contain a valid value!");
		var c=document.forms["signup"]["enroll"].value;
		if(c=="" || c==NULL)
			alert("Answer should contain a valid value!");
		return false;
	}
</script>
</head>
<body background="background.jpg">
	<img class="banner" src="banner.jpg">
	<img class="bannerlow" src="bannerlow.jpg">
	<img class="jiitlogo" src="logo.png">
	<img class="bar" src="bar2.png">
	<table class="homebar">
		<tr>
			<th><a href=""><font face="times new roman" size="4">STUDENT</font></a></th>
			<th><a href="employeelogin.php"><font face="times new roman" size="4">EMPLOYEE</font></a></th>
			<th><a href="guestlogin.php"><font face="times new roman" size="4">GUEST</font></a></th>
			<th><a href="contact_us.php"><font face="times new roman" size="4">CONTACT US</font></a></th>
		</tr>
	</table><br><br>
	<table class="login">
		<tr>
			<td>
				<form name="signup" id="signup" action="" method="post" onsubmit="return forgot()";>
					<p class="textbox">
					<font size="5px">
					Institute &nbsp&nbsp&nbsp&nbsp&nbsp    
					</font>
					  <select class="resizedTextbox" name="ins" id="ins">
					  <option value="j128">J128</option>
					  </select><font color="red">&nbsp*</font><br>
					<font size="5px">
					Programme &nbsp&nbsp&nbsp
					</font>
					  <select class="resizedTextbox">
					  <option value="jiit">CSE</option>
					  <option value="j128">ECE</option>
					  </select><font color="red">&nbsp*</font><br>  
					<font size="5px">
					Member Type &nbsp&nbsp&nbsp&nbsp    
					</font>
					  <select class="resizedTextbox" id="MEMBER_TYPE" name="MEMBER_TYPE">
					  <option value="student">STUDENT</option>
					  <option value="employee">EMPLOYEE</option>
					  </select><font color="red">&nbsp*</font><br>
					<font size="5px">Enrollment No&nbsp&nbsp&nbsp&nbsp </font><input type="text" name="enroll" id="enroll" class="resizedTextbox" placeholder="Enrollment Number" required><font color="red">&nbsp*</font><br>
					<font size="5px">Name &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </font><input type="text" name="name" id="name" class="resizedTextbox" placeholder="Full Name" required><font color="red">&nbsp*</font><br>
					<font size="5px">Password/Pin &nbsp&nbsp </font><input type="password" name="pass" id="pass" class="resizedTextbox" placeholder="Password" required><font color="red">&nbsp*</font><br>
					<font size="5px">DOB &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </font><input type="date" name="dob" id="dob" class="resizedTextbox" placeholder="MM-DD-YY" required><font color="red">&nbsp*</font><br>
					<font size="5px">Address &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </font><input type="text" name="address" id="address" class="resizedTextbox" placeholder="Address" required><font color="red">&nbsp*</font><br>
					<font size="5px">Phone No &nbsp&nbsp&nbsp&nbsp&nbsp </font><input type="tel" name="phone" id="phone" class="resizedTextbox" placeholder="Phone No." required><font color="red">&nbsp*</font><br>
					<font size="5px">Security Question &nbsp&nbsp </font><input type="text" name="ques" id="ques" class="resizedTextbox" placeholder="Question" required><font color="red">&nbsp*</font><br>
					<font size="5px">Answer &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp </font><input type="text" name="ans" id="ans" class="resizedTextbox" placeholder="Answer" required><font color="red">&nbsp*</font><br>
					</p><br>
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="submit" name="submit" value="SUBMIT" onclick="validation()">
					<br><br>
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