<script type="javascript">
	function validation()
	{
		var x=document.forms["signup"]["enroll"].value;
		if(x.length>10 || x.length<10 || isNaN(x))
			alert("ID must be digits and of 10 length!");
		var y=document.forms["signup"]["pass"].value;
		if(y.length>15)
			alert("Password can be atmost 15 characters long!");	
		var z=document.forms["signup"]["address"].value;
		if(x=="" || x==NULL)
			alert("Address should contain a valid value!");
		var a=document.forms["signup"]["phone"].value;
		if(a.length>10 || a.length<10 || isNaN(a))
			alert("phone no should be of the proper format!");
		var b=document.forms["signup"]["ques"].value;
		if(b=="" || b==NULL)
			alert("Security Question should contain a valid value!");
		var x=document.forms["signup"]["enroll"].value;
		if(x=="" || x==NULL)
			alert("Answer should contain a valid value!");
		return false;
	}
</script>