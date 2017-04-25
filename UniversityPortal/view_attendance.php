<?php
	session_start();
	if(isset($user))
		header('location:index.php');
	$user = $_SESSION['username'];
	$con=mysqli_connect('localhost','root','','university');
	$query = "SELECT * from student where stu_id='$user'";

	$result = mysqli_query($con,$query);
	$u = mysqli_fetch_array($result,MYSQL_ASSOC);
	$batch = $u['batch'];
	$year = $u['year'];
	$q1 = "Select  Distinct date  from attendance where stu_id='$user'";
	$exm = mysqli_query($con,$q1);
	$q2 = " Select Distinct course_id from attendance where stu_id='$user'";
	$cid = mysqli_query($con,$q2);
?>
<html>
	<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Welcome <?php echo $_SESSION['Student_name'];?>
	</title>
	<body background="1019286_abstract_orange_tiles_background_.jpg">
		<img class="banner" src="banner.jpg">
		<img class="bannerlow" src="bannerlow.jpg">
		<img class="jiitlogo" src="logo.png">
		<p align="right">Welcome  <?php echo $_SESSION['Student_name'];?> <br/>
		<a href="logout.php" align="right">Logout</a></p>
		<br/>
		<br/>
		<form align="center" name="form1" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
			<table align="center" border="3px" class="table">
			<tr><td>
			Date <select name="date">
			<?php while ($row = mysqli_fetch_array($exm,MYSQL_ASSOC)) { ?>
			<option name="date" value="<?php echo $row['date'];?>"><?php echo $row['date'];?></option>
			<?php } ?>
			</select>
			Course <select name="course">
			<option name="course" value="-">-</option>
			<?php while ($row = mysqli_fetch_array($cid,MYSQL_ASSOC)) { ?>
			<option name="course" value="<?php echo $row['course_id'];?>"><?php echo $row['course_id'];?></option>
			<?php }?>
			</select>
			</td></tr>
			</table>
			</br>
			<table align="center" >
			<tr><td align="center"><input type="submit" value="Submit" name="view" ></td></tr>
			</table>
		</form>
		
			<?php
			if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
				$e1 = $_POST['date'];
				$c1= $_POST['course'];
				if ($c1=='-')
				$query = "Select * from attendance where stu_id='$user' and date = '$e1'";	
				else		
			 $query = "Select * from attendance where stu_id='$user' and date = '$e1' and course_id='$c1'";
			 $result = mysqli_query($con,$query);
			 ?>
			<table align="center" border="3px" class="table">
			<tr><td>Course ID </td>
				<td>Date </td>
				<td>Time </td>
				<td>Attendance </td>
			<tr>
			 <?php
			while ($row = mysqli_fetch_array($result,MYSQL_ASSOC))
			{
			?>
			<tr><td><?php echo $row['course_id'] ?></td>
				<td><?php echo $row['date'] ?></td>
				<td><?php echo $row['time'] ?></td>
				<td><?php echo $row['attendance_r'] ?></td>
			</tr>
			
			<?php 
			}
			?>
			</table></br></br>
			<div class="wrapper">
			<a href="student_main.php"> <input class="button" name="newThread" type="button" value="Back" align="center"></a>
		</div>
			<?php }?>
	</body>
</html>