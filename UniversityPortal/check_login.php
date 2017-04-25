<?php
	session_start();
?>


<!DOCTYPE html>
<html>
<body>

<?php
    
	$var=$_POST['MEMBER_TYPE'];

	$host="localhost"; 		// Host name 
	$username="root"; 		// Mysql username 
	$password=""; 			// Mysql password 
	$db_name="university"; 	// Database name 
	if($var==$_SESSION['MEMBER_TYPE'])
		$tbl_name="student"; 	// Table name 
	else if($var=='EMPLOYEE')
		$tbl_name="teacher";
	else
		$tbl_name="non-teaching faculty";

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
	if($var=='STUDENT')
		$sql="SELECT * FROM $tbl_name WHERE stu_id='$myusername' and password='$mypassword'"; 
	else if($var=='EMPLOYEE')
		$sql="SELECT * FROM $tbl_name WHERE teacher_id='$myusername' and password='$mypassword'";
	else
		$sql="SELECT * FROM $tbl_name WHERE id='$myusername'";
	

	$result=mysqli_query($connection, $sql);

	// Mysql_num_row is counting table row
	$count=mysqli_num_rows($result);

	// If result matched $myusername and $mypassword, table row must be 1 row
	if($count==1){
		// Register $myusername, $mypassword and redirect to file "loginsuccess.php"
		$_SESSION["username"]= $myusername; 
		$_SESSION["password"]= $mypassword; 
		header("location:loginsuccess.php");
	}
	else {
		echo "</br></br>";
		echo "Wrong Username or Password";
	}
	?>
</body>
</html>

