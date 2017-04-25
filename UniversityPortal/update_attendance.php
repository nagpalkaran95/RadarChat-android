<?php
 session_start();
 if (!isset($_SESSION['username']))
	 header("location:login.html");
?> 	
<?php 
				function save(){
					$marks = $_REQUEST['marks'];
					$sid = $_REQUEST['stu_id'];
					$exm= $_REQUEST['exm'];
					$con2=mysqli_connect('localhost','root','','university');
						if (mysqli_connect_errno()) {
						echo "Failed to connect to MySQL: " . mysqli_connect_error();
						}	
						$tid=$_SESSION['username'];$cid=$_SESSION['campus_id'];	
						$upd=" update marks set marks='$marks' where stu_id='$sid' and exam_code='$exm' and teacher_id='$tid' and campus_id='$cid' ";
						mysqli_query($con2,$upd);
						mysqli_close($con2);
				}
				 ?>

<html>
	<head>
		<style >
		.wrapper {
			text-align: center;
			}

		.button {
			position: center;
			}
		</style>
		<link href="style.css" rel="stylesheet" type="text/css">
		<title>Welcome <?php echo $_SESSION['Teacher_name'];?>
		</title>
	</head>
	<body bgcolor="#85F800">
		<img class="banner" src="banner.jpg">
		<img class="bannerlow" src="bannerlow.jpg">
		<img class="jiitlogo" src="logo.png">
		<p align="right">Welcome  <?php echo $_SESSION['Teacher_name']; ?> <br/>
		<a href="logout.php" align="right">Logout</a></p>
		<?php
			 $con=mysqli_connect('localhost','root','','university');
			 if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	} 
		$tid=$_SESSION['username'];
		$sql="SELECT DISTINCT (batches) FROM teaches_batch WHERE teacher_id='$tid'";
		$sql2="SELECT DISTINCT (teaches_year) FROM teaches_batch WHERE teacher_id='$tid'";
		$sql3="Select Distinct date from  attendance where teacher_id='$tid' ";
		$result2=mysqli_query($con,$sql2);
		$result= mysqli_query($con,$sql);	
		$result3=mysqli_query($con,$sql3);
		if (!$result) { // add this check.
			die('System Failed ' . mysql_error());
		}
		if (!$result2) { // add this check.
		die('System Failed ' . mysql_error());
		}
		?>
		<br/>
		<table align="center" border="3px" class ="table">
			<tr><td>
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
					Date <select name="date">
						<?php while($line = mysqli_fetch_array($result3,MYSQLI_ASSOC)) {?>
						<option name="date" value= "<?php echo $line['date']?>"><?php echo $line['date']?></option>
						<?php } ?>
						</select>
					Time <Select name="time">
						<?php 
						$i=9;
						while($i<=17) {?>
						<option name='time' value="<?php echo $i . ":00"; ?>"><?php echo $i++ .  ":00";?></option>
						<?php
						} ?>
					</select>
			</td></tr>
			</table>
			</br>
			<div class="wrapper"><input type="submit" value="Show Attendance" class="button">	
			</div>
			</form>
			<?php
				if ($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER['REQUEST_METHOD']=="GET") {
					// collect value of input field
					if ($_SERVER["REQUEST_METHOD"] == "POST"){
					$ty = $_REQUEST['year'];
					$tb = $_REQUEST['batch'];
					$date = $_REQUEST['date'];
					$id=$_SESSION['username'];
					$time=$_REQUEST['time'];
					$query2 = "SELECT * FROM Attendance as A, Student AS s where s.batch='$tb' and s.year='$ty' and A.teacher_id='$id' and A.date='$date' and A.time='$time' and s.stu_id=A.stu_id";
					$show = mysqli_query($con,$query2);
					if (!$show) { // add this check.
					 die('Invalid query: ' . mysql_error());
					 trigger_error(mysql_error().$sql);
					}
			?>
			<table align="center" border="3px" class ="table">
			<br/><br/><br/>
			<tr>
				<td>Student Id</td>
				<td>Course Id</td>
				<td>Date</td>
				<td>Time</td>
				<td>Attendance</td>
			</tr>
					<?php
					while ($record= mysqli_fetch_array($show,MYSQLI_ASSOC))
						{
					?>		
					<tr>
						<form name="update_attendance" method="POST" action="update_A.php">
						<td><input type="text" name="stu_id" value="<?php echo $record['stu_id']; ?>" readonly></td>
						<td><input type="text" name="course_id" value="<?php echo $record['course_id'];?>" readonly></td>
						<td><input type="date" name="date" value="<?php echo $record['date']; ?>" readonly></td>
						<td><input type="time" name="time" value="<?php echo $record['time']?>" readonly></td>
						<td><input type="text" name="attendance" pattern ="[APap]{1,1}" value="<?php echo $record['attendance_r'];?>" required></td>
						<td><input type="submit" value="Save" > </td>
						</form>
					</tr>
				<?php } } }
				mysqli_close($con);
				?>
			</table>
					
				
			<br/><br/>
			<div class="wrapper">
			<a href="teacher.php"> <input class="button" name="newThread" type="button" value="Back" align="center"></a>
			</div>
			
	</body>
</html>