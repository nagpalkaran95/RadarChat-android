<?php
session_start();
if(!isset($_SESSION['username'])) {
		header("location:index.php");
	}
?>
<html>
<head>
<style>
body{
background-color: crimson;
 }
.wrapper
{
margin-top: -8px;
margin-left: -8px;
}

.bannerl
{
 margin-left: -8px;
}

.logo{
margin-left: 0px;
margin-top: -170px;
height: 300px;
width: 300px;
}
h2{
text-align: center;
color: white;
}
p{
	text-align: center;
	color: white;
	}
#goal{
 text-align: center;
}
#b1{
 position: absolute;
}
</style>
<script>
function goBack()
{
 window.history.back();
}
</script>
</head>
 <body>
 <img class="wrapper" src="banner.jpg">

 
<img class="bannerl" src="bannerlow.jpg">
<img class="logo" src="logo.png">

 <h2> YOU HAVE SUCCESSFULLY SUBMITTED THE FOLLOWING INFORMATION </h2><br><br>
 
<?php
echo "<center>";
$_Name=$_POST['Name'];
$_eno=$_POST['eno'];
$_Email=$_POST['Email'];
$_Subject=$_POST['Subject'];
echo"NAME:" . $_Name. "<br>" . "<br>";
echo"ENROLLMENT-NUMBER: " . $_eno . "<br>" . "<br>";
echo"EMAIL: ". $_Email. "<br>" . "<br>";
echo"COMPANY APPLIED: ". $_Subject . "<br>" . "<br>";
$con = mysqli_connect('localhost','root','','university');
if (!$con)
	echo mysql_error();
$query = "insert into company_details values ('$_eno','$_Name','$_Subject')";
mysqli_query($con,$query);
echo "</center>";
?> 

 <p>THANK YOU!! HAVE A NICE DAY!</p>
  <a href="logout.php" align="right">LOGOUT</a>
  <button id="b1" onclick="goBack()">Go Back </button>
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