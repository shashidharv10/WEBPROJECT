<?php 
	include('header.php');	
?>
	<TITLE>Administrator</TITLE>
	<center><h2><font color="white">WELCOME ADMIN</font></h2></center>
	<link rel = "stylesheet" type="text/css" href="styles.css">
	<center><h2><font color="white">CHOOSE</font></h2>
	<p>
	<form>
		<center><input type="button" value="CHANGE PASSWORD" onclick="window.location.href='http://localhost/ChangePwd.php'" /></center><br /><br />			
		<center><input type="button" value="UPDATE INVENTORY" onclick="window.location.href='http://localhost/updatePlant.php'" /></center><br /><br />			
		<center><input type="button" value="VIEW CUSTOMER INFO" onclick="window.location.href='http://localhost/custinf.php'" /></center><br />	<br />		
		<center><input type="button" value="VIEW EMPLOYEE INFO" onclick="window.location.href='http://localhost/empinf.php'" /></center>	<br /><br />		
		<center><input type="button" value="VIEW TRANSACTION DETAILS" onclick="window.location.href='http://localhost/Transaction.php'"/>
	</form> 
	</p>
	
	
<?php include('footer.php'); ?>

