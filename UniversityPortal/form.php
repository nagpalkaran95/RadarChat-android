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
background-color: orange;
}
.wrapper{
margin-top: -8px;
margin-left: -8px;
}


.bannerl{
 margin-left: -8px;
}

.logo{
margin-left: 0px;
margin-top: -170px;
height: 300px;
width: 300px;
}

h1
{
 text-align: right;
font-size: 22px;
color: green;
margin-top: -120px;
}
#goal{
 text-align: center;
}
#b1{
 position: absolute;
}


</style>
<script>
function ValidateContactForm()
{
    var name = document.ContactForm.Name;
    var email = document.ContactForm.Email;
    var phone = document.ContactForm.Telephone;
    var web= document.ContactForm.web;  
    var what = document.ContactForm.Subject;
    var comment = document.ContactForm.Comment;

    if (name.value ==" ")
    {
        window.alert("Please enter your name.");
        name.focus();
        return false;
    }
   if(web.value==" ")
{
 window.alert("please enter a valid website");
web.focus();
return false;
 }
    if (email.value ==" ")
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }
    if (email.value.indexOf("@", 0) < 0)
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }
    if (email.value.indexOf(".", 0) < 0)
    {
        window.alert("Please enter a valid e-mail address.");
        email.focus();
        return false;
    }

    if ((nocall.checked == false) && (phone.value == ""))
    {
        window.alert("Please enter your telephone number.");
        phone.focus();
        return false;
    }

    if (what.selectedIndex < 1)
    {
        alert("Please select a company");
        what.focus();
        return false;
    }

    if (comment.value ==" ")
    {
        window.alert("Please provide a detailed description or comment.");
        comment.focus();
        return false;
    }
    return true;
}

function EnableDisable(chkbx)
{
    if(chkbx.checked == true)
    {
        document.ContactForm.Telephone.disabled = true;
    }
    else
    {
        document.ContactForm.Telephone.disabled = false;
    }
}
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

<h1>Welcome, <?php echo $_SESSION['Name'];?></h1> <br>
<form method="post" action="show.php" align="center" name="ContactForm" onsubmit="return ValidateContactForm()";>
<p>Name: <input type="text" size="35" name="Name" required></p><br>
    <p>Enrollment-Number: <input type="number" size="10" name="eno" required></p><br><br>
     <p>E-mail Address:  <input type="Email" size="35" name="Email"></p><br><br>
    <p>Telephone: <input type="text" size="35" name="Telephone"><br><br>
	
        <input type="checkbox" name="DoNotCall" 
        onclick="EnableDisable(this);"> Please do not call me.</p>
    <p>Please Enter A Company Name <input type="text" size="30" name="Subject" required></p>
            
<p>Website: <input type="url" size="35" name="web" required></p><br><br>
    <p>Comments:  <textarea cols="65" name="Comment">  </textarea></p><br><br>
    <p><input type="submit" value="submit" name="submit">
    <input type="reset" value="RESET" name="reset"></p><br><br>

</form>

<div id="goal">
<button id="b1" onclick="goBack()">Go Back </button>
</div>
<a href="logout.php" align="center">LOGOUT</a>
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
