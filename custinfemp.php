<html>
<head>
<?php include('header.php'); ?>
<title>Customer Details</title>
</head>
<body>
<center><h2><font color="white">CUSTOMER INFORMATION</font></h2></center>

	<center><h3><font color="white">CHOOSE</font></h3></center>
	<p>
	<form>
		<center><h3><font color="white">ADD A NEW CUSTOMER</font></h3></center><br />
		<center><input type="button" value="ADD NEW CUSTOMER" onclick="window.location.href='http://localhost/AddCustEmp.php'" /></center><br />
			
		<center><h3><font color="white">UPDATE CUSTOMER DETAILS</font></h3></center><br />
		<center><input type="button" value="UPDATE CUSTOMER" onclick="window.location.href='http://localhost/updateCustEmp.php'" /></center><br />
		<center><h3><font color="white">VIEW CUSTOMER DETAILS</font></h3></center><br />
		<center><input type="button" value="VIEW DETAILS" onclick="window.location.href='http://localhost/viewCustEmp.php'" /></center><br />	
	</form> 
	</p>
	</div>
	
	
<?php include('footer.php'); ?>
</div>
<form method='GET' action='Staff.php'>
<input type='Submit' value = 'BACK'>
		</form>


