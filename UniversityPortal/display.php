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
background-color: lightgreen;
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
margin-top: -170px;
height: 300px;
width: 300px;
}
h1{
 text-align: right;
font-size: 22px;
color: red;
margin-top: -110px;
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
 <h1> Welcome,<?php echo $_SESSION['Name'];?></h1>
 <?php 
 $con = mysqli_connect('localhost','root','','university');
 if (!$con) 
 { 
 die('Could not connect: ' . mysql_error()); 
 }  
 echo "<br>";
 echo "<br>";
 echo "<br>";
 echo "<br>";
 echo "<br>";
$query= "Select * from company_details"; 
$result = mysqli_query($con,$query);  
while($row = mysqli_fetch_array($result,MYSQL_ASSOC))
 { 
  echo $row["c_name"] . " " . $row["u_name"] ."</br>";     
 
 }
 mysqli_close($con); 
?>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div id="goal">
<button id="b1" onclick="goBack()">Go Back </button>
</div>
<a href="logout.php" align="right">LOGOUT</a> 
<br><br>
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