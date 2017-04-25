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
		<title>Welcome <?php echo $_SESSION['Teacher_name']; ?>
		</title>
	</head>
	<body bgcolor="pink">
		<img class="banner" src="banner.jpg">
		<img class="bannerlow" src="bannerlow.jpg">
		<img class="jiitlogo" src="logo.png">
		<p align="right">Welcome  <?php echo $_SESSION['Teacher_name'];?> <br/>
		<a href="logout.php" align="right">Logout</a></p>
		<?php
		$con2=mysqli_connect('localhost','root','','university');
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$i=0;
		$tid=$_SESSION['username'];	
		$cid=$_SESSION['campus_id'];
		while (isset($_POST[$i])){
		$sid=$_POST[$i++];
		$course_id = $_POST[$i++];
		$date=$_POST[$i++];
		$time=$_POST[$i++];
		$attendance= $_POST[$i++];
		//$marks = $_POST[$i++];				
		//$upd=" Update Attendance set Attendance_r='$attendance' where stu_id='$sid' and date='$date' and teacher_id='$tid' and campus_id='$cid' and course_id='$course_id'  ";
		$upd= "update attendance set attendance_r='$attendance' where stu_id='$sid' and date='$date' and teacher_id='$tid' and campus_id='$cid' and course_id='$course_id' and time='$time'";
		mysqli_query($con2,$upd);	
		
		} 
		mysqli_close($con2);
		header('location:Add_A.php')
		?>
	</body>
</html>