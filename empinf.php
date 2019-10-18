<html>
<TITLE>Employee Options</TITLE>
<head>
<?php include('header.php'); ?>
<title>Employee Details</title>
</head>
<body>
<center><h2><font color="white">EMPLOYEE INFORMATION</font></h2></center>

	<center><label><h3><font color="white">CHOOSE</font></h3></label></center>
	<p>
	<form>
		<center><h3><font color="white">ADD A NEW EMPLOYEE</font></h3></center><br />
		<center><input type="button" value="ADD NEW EMPLOYEE" onclick="window.location.href='http://localhost/AddEmp.php'" /></center><br />
			
		<center><h3><font color="white">UPDATE EMPLOYEE DETAILS</font></h3></center><br />
		<center><input type="button" value="UPDATE EMPLOYEE" onclick="window.location.href='http://localhost/updateEmp.php'" /></center><br />	
		<center><h3><font color="white">VIEW EMPLOYEE DETAILS</font></h3></center><br />
		<center><input type="button" value="VIEW DETAILS" onclick="window.location.href='http://localhost/viewEmp.php'" /></center><br />			
	</form> 
	</p>
	</div>
	
	
<?php include('footer.php'); ?>
</div>
<form method='GET' action='admin.php'>
<input type='submit' value = 'BACK'>
		</form

