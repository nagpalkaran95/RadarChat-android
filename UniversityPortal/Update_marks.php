<?php
 session_start();
 if (!isset($_SESSION['username']))
	 header("location:index.php");
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
		<title>Welcome <?php echo $_SESSION['Teacher_name']; ?>
		</title>
	</head>
	<body bgcolor="#FE2341">
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
			 $sql3="SELECt DISTINCT exam_code FROM marks ";
			 $resutt=mysqli_query($con,$sql3);
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
					Exam_code <select name="exm">
					<option name="exm" value="-">Select</option>
					<?php while($e= mysqli_fetch_array($resutt,MYSQLI_ASSOC)) {?>
					<option name="exm" value="<?php echo $e['exam_code']?>"><?php echo $e['exam_code']?></option>
					<?php } ?>
					</select>
			</td></tr>
		</table>
		</br>
		<div class="wrapper"><input type="submit" value="Show marks" class="button">	
		</div>
		</form>
		<?php
			if ($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER['REQUEST_METHOD']=="GET") {
				if ($_SERVER["REQUEST_METHOD"] == "POST"){
				$ty = $_REQUEST['year'];
				$tb = $_REQUEST['batch'];
				$exm=$_REQUEST['exm'];
				$id=$_SESSION['username'];
				if ($exm=="-")
				$query2 = "SELECT * FROM marks as m, Student AS s where s.batch='$tb' and s.year='$ty' and m.teacher_id='$id' and  m.stu_id=s.stu_id ";
				else 
				$query2 = "SELECT * FROM marks as m, Student AS s where s.batch='$tb' and s.year='$ty' and m.teacher_id='$id' and m.exam_code='$exm' and m.stu_id=s.stu_id ";
				//$query2 = "SELECT * FROM marks as m, Student AS s where s.batch='$tb' and s.year='$ty' and m.teacher_id='$id' and m.exam_code='$exm' ";
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
				<td>Exam_code</td>
				<td>Marks</td>
			</tr>
					<?php
					while ($record= mysqli_fetch_array($show,MYSQLI_ASSOC))
						{
					?>		
					<tr>
						<form name="update_marks" method="POSt" action="update.php">
						<td><input type="text" name="stu_id" value="<?php echo $record['stu_id']; ?>" readonly></td>		
						<td><input type="text" name="course_id" value="<?php echo $record['course_id']; ?>" readonly></td>
						<td><input type="text" name="exm" value="<?php echo $record['exam_code'];?>" readonly></td>
						<td><input type="number" name="marks" value="<?php echo $record['marks'];?>"></td>
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