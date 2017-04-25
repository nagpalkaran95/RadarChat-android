<?php
session_start();
if(!isset($_SESSION['username'])) {
		header("location:index.php");
	}
?>
<html>
<head>
<title>
CAMPUS CARE
</title>
<style type="text/css">
body{
background-color: cyan;
}
.wrapper{
margin-top: -8px;
margin-left: -8px;
}


.bannerl{
 margin-left: -8px;
}



.logo{
margin-left: 20px;
margin-top: -180px;
height: 300px;
width: 300px;
}
h1{
 text-align: right;
font-size: 22px;
color: red;
margin-top: -110px;
}
h2{
font-size:25px;
font-weight:bold;
text-decoration: underline;
color: purple;
margin-top: 120px;
}


ul {
    list-style-type: dynamic;
    margin-left: 600px; 
    padding: 20px;
font-size: 20px;
}

a {
    display: block;
    width: 70px;
}
</style>
</head>
<body>
<img class="wrapper" src="banner.jpg">

<img class="bannerl" src="bannerlow.jpg">
<img class="logo" src="logo.png">
<h1> Welcome, <?php echo $_SESSION['Name'];?></h1>
<h2 align="center"> AVAILABLE OPTIONS </h2>

<p>
<ul>
  <li><a href="display.php">APPLIED COMPANIES</a></li><br><br>
  <li><a href="form.php">FILL COMPANY FORM</a></li><br><br><br>
 <a href="logout.php" align="right">LOGOUT</a> 
</ul>
</p>
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
