<?php
 session_start();
if (!isset($_SESSION['username']))
	header('location:index.php');
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>
			Welcome <?php echo $_SESSION['Teacher_name'];?>
		</title>
	<head>
<body bgcolor="#DF02FE">
	<img class="banner" src="banner.jpg">
	<img class="bannerlow" src="bannerlow.jpg">
	<img class="jiitlogo" src="logo.png">
	<p align="right">Welcome  <?php echo $_SESSION['Teacher_name'];?> <br/>
	<a href="logout.php" align="right">Logout </a></p>
	<br/>
	<?php
		$con=mysqli_connect('localhost','root','','university');
		if (mysqli_connect_errno()) {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
		}
		$tid=$_SESSION['username'];
		$sql="SELECT DISTINCT (batches) FROM teaches_batch WHERE teacher_id='$tid'";
		$sql2="SELECT DISTINCT (teaches_year) FROM teaches_batch WHERE teacher_id='$tid'";
		$sql3="SELECt DISTINCT course_id FROM course where teacher_id='$tid' ";
		$result3=mysqli_query($con,$sql3);
		$result2=mysqli_query($con,$sql2);
		$result= mysqli_query($con,$sql);		 
		if (!$result) { // add this check.
			die('Invalid query: ' . mysql_error());
			trigger_error(mysql_error().$sql);
		}
		if (!$result2) { // add this check.
			trigger_error(mysql_error().$sql);
		}
		?>
		<br/>
		<table align="center" border="3px"class ="table">
			<tr><td align="center">
				<form name="form_marks" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
					Batch <select name="batch" >
						<?php
						while ($line = mysqli_fetch_array($result,MYSQLI_ASSOC)) {  ?>
						<option name="batch" value= "<?php echo $line['batches']?>"><?php echo $line['batches']?></option>
						<?php } ?>
					</select>
					Year <select name="year">
						<?php while($line = mysqli_fetch_array($result2,MYSQLI_ASSOC)) {?>
						<option name="year" value= "<?php echo $line['teaches_year']?>"><?php echo $line['teaches_year']?></option>
						<?php } ?>
					</select>
					Course Id <select name="course_id">
					<?php while($line = mysqli_fetch_array($result3,MYSQLI_ASSOC)) {?>
					<option name="course_id" value= "<?php echo $line['course_id']?>"><?php echo $line['course_id']?></option>
					<?php } ?>
					</select>
			</td></tr>
			<tr><td align="center">
					Date <input class="input" type="date" name="date" required>
					Time <Select name="time">
						<?php 
						$i=9;
						while($i<=16) {?>
						<option name="time" value="<?php echo $i .":00"; ?>"><?php echo $i++ .":00";?></option>
						<?php } ?>
					</select>
			</td></tr>
		</table>
		</br>
		<div class="wrapper"><input type="submit" value="Next" class="button">	
		</div>
		</form>
		<?php
		if ($_SERVER["REQUEST_METHOD"]=="POST")
		{
			$batch=$_POST['batch'];
			$year =$_POST['year'];
			$date=$_POST['date'];
			//$fdate= date("Y-m-d",strtotime($date));
			$time=$_POST['time'];
			$course = $_POST['course_id'];
			$q = " SELECT stu_id from student where batch='$batch' and year='$year' ";
			$r = mysqli_query($con,$q);
			$cid= $_SESSION['campus_id'];
			while ($s = mysqli_fetch_array($r,MYSQLI_ASSOC)) {  ?>
				
				<?php
				$i = "Insert into attendance values ('$s[stu_id]','$cid','$date','$time','-','$tid','$course')";
				$R=mysqli_query($con,$i);
				if(!$R)
					echo mysql_error();
			}
			$q="Select * from attendance where course_id='$course' and teacher_id='$tid' and campus_id='$cid' and time='$time'and date='$date'";
			$r=mysqli_query($con,$q);
			if(!$r)
				echo mysql_error();
		?>
		<table align="center" border="2px" class ="table">
		<tr><td>Student Id</td><td>Course Id</td><td>date</td><td>Time</td><td>Attendance</td></tr>	
		<form name="addattendace" method="POST" action="Add_AA.php">
		<?php
		$i=0;
			while($s = mysqli_fetch_array($r,MYSQLI_ASSOC)){
				//	echo "working";
		?>
		 
			<tr><td><input type="text" name="<?php echo $i++;?>" value="<?php echo $s['stu_id'];?>"readonly></td>
			<td><input type="text" name="<?php echo $i++;?>" value="<?php echo $s['course_id'];?>" readonly ></td>
			<td><input type="date" name="<?php echo $i++;?>" value="<?php echo $s['date'];?>" readonly></td>
			<td><input type="time" name="<?php echo $i++?>" value="<?php echo $s['time'];?>" readonly></td>
			<td><input type="text" name="<?php echo $i++;?>" value="<?php echo $s['attendance_r'];?>" pattern ="[APap]{1,1}" required></td>
			
	</tr>
		<?php
			}
		?>
		</table>
		</br></br>
		<div class="wrapper">
		<input name="Add" type="submit" value="Add" align="center"></td>
		</div>
		</form>
		<br/><br/>
		
		<?php
		}
		?>
		</br>
		<div class="wrapper">
			<a href="teacher.php"> <input class="button" name="newThread" type="button" value="Back" align="center"></a>
		</div>
		
</body>
</html>