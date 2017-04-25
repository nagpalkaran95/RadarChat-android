//checklogin.php
<?php
	session_start();
?>


<!DOCTYPE html>
<html>
<body>

<?php
	$host="localhost"; 		// Host name 
	$username="root"; 		// Mysql username 
	$password=""; 			// Mysql password 
	$db_name="university"; 		// Database name 
	$tbl_name="student"; 	// Table name 

	// Connect to server and select databse.
	$connection = mysqli_connect('localhost', 'root', '', 'university');
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}


	// username and password sent from form 
	$myusername=$_POST['enroll']; 
	$mypassword=$_POST['pass']; 

	// To protect MySQL injection 
	$myusername = stripslashes($myusername);
	$mypassword = stripslashes($mypassword);
	$myusername = mysqli_real_escape_string($connection, $myusername);
	$mypassword = mysqli_real_escape_string($connection, $mypassword);
	$sql="SELECT * FROM $tbl_name WHERE stu_id='$myusername' and password='$mypassword'";

	$result=mysqli_query($connection, $sql);
	$u =mysqli_fetch_array($result,MYSQL_ASSOC);
	// Mysql_num_row is counting table row
	$count=mysqli_num_rows($result);

	// If result matched $myusername and $mypassword, table row must be 1 row
	if($count==1){
		// Register $myusername, $mypassword and redirect to file "login_success.php"
		$_SESSION["username"]= $myusername; 
		$_SESSION["password"]= $mypassword; 
		$_SESSION['Student_name']=$u['stu_name'];
		header("location:student_main.php");
	}
	else {
		header("location:studentlogin.php");		
	}
	?>
</body>
</html>

