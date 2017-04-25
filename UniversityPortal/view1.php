<?php
 session_start();
 if (!isset($_SESSION['username']))
	 header("location:index.php");
?> 	

<html>
	<head>
		<link href="style.css" rel="stylesheet" type="text/css">
		<style >
		.wrapper {
			text-align: center;
			}

		.button {
			position: center;
			}
		</style>
		<title>Welcome <?php echo $_SESSION['Student_name']; ?>
		</title>
	</head>
	<body background="1019286_abstract_orange_tiles_background_.jpg">
		<img class="banner" src="banner.jpg">
		<img class="bannerlow" src="bannerlow.jpg">
		<img class="jiitlogo" src="logo.png">
		<p align="right">Welcome  <?php echo $_SESSION['Student_name'];?> <br/>
		<a href="logout.php" align="right">Logout</a></p>
		
		<?php 
		 $sid = $_SESSION['username'];
	 	 $con2=mysqli_connect('localhost','root','','university');
						if (mysqli_connect_errno())
						{
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
						}
	 $query="SELECT * FROM student where stu_id=$sid";
		
		 $result= mysqli_query($con2,$query);
		  $u = mysqli_fetch_array($result,MYSQL_ASSOC);
		  mysqli_close($con2);
		  
		?>
		<table align="center" border="3px" class="table">
		<tr><td>Enrollment Number</td><td><?php echo $u['stu_id']; ?></tr>
		<tr><td>Name</td><td><?php echo $u['stu_name']; ?></tr>
		<tr><td>Date Of Birth</td><td><?php echo $u['dob']; ?></tr>
		<tr><td>Address</td><td><?php echo $u['address']; ?></tr>
		<tr><td>Phone Number</td><td><?php echo $u['phone_no']; ?></tr>
		<tr><td>Program Register</td><td><?php echo $u['programme']; ?></tr>
		<tr><td>Current Year</td><td><?php echo $u['year']; ?></tr>
		<tr><td>Batch</td><td><?php echo $u['batch']; ?></tr>
		</table>
		<br><br>
		<div class="wrapper">
			<a href="student_main.php"> <input class="button" name="newThread" type="button" value="Back" align="center"></a>
		</div>
</body>
</html>		