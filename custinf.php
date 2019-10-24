<html>
<head>
<?php include('header.php'); ?>
<title>Customer Options</title>
</head>
<body>
<center><h2><font color="white">CUSTOMER INFORMATION</font></h2></center>

	<center><h3><font color="white">CHOOSE</font></h3></center>
	<p>
	<form>
		<center><h3><font color="white">ADD A NEW CUSTOMER</font></h3></center><br />
		<center><input type="button" value="ADD NEW CUSTOMER" onclick="window.location.href='http://localhost/AddCust.php'" /></center><br />
			
		<center><h3><font color="white">UPDATE CUSTOMER DETAILS</font></h3></center><br />
		<center><input type="button" value="UPDATE CUSTOMER" onclick="window.location.href='http://localhost/updateCust.php'" /></center><br />		
		<center><h3><font color="white">VIEW CUSTOMER DETAILS</font></h3></center><br />
		<center><input type="button" value="VIEW DETAILS" onclick="window.location.href='http://localhost/viewCustAdmin.php'" /></center><br />		
	</form> 
	</p>
	</div>
	
	
<?php include('footer.php'); ?>
</div>
<form method='GET' action='admin.php'>
<input type='Submit' value = 'BACK'>
		</form>


