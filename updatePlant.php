<?php include('header.php'); ?>
<TITLE>Update Plant</TITLE>
	<center><h2><font color="white">UPDATE INVENTORY</font></h2></center><br />
	<center><h2><font color="white">CHOOSE</font></h2>
	<p>
	<form>
		<cenetr><h3><font color="black">ADD A NEW PLANT</font></center></h3><br />
		<center><input type="button" value="ADD NEW" onclick="window.location.href='http://localhost/AddPlant.php'" /></center><br />
		<center><h3><font color="black">DELETE or UPDATE THE QUANTITY or PRICE</font></center></h3><br />
		<center><input type="button" value="UPDATE" onclick="window.location.href='http://localhost/update.php'" /></center><br/>
		<center><h3><font color="black">VIEW PLANTS</font></center></h3><br />
		<center><input type="button" value="VIEW DETAILS" onclick="window.location.href='http://localhost/viewPlant.php'" /></center><br/>
		
	</form> 
	<form method='GET' action='admin.php'>
	<input type='submit' value = 'BACK'>
 	</form>
<?php include('footer.php'); ?>