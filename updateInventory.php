<?php include('header.php'); ?>
<TITLE>Update Inventory</TITLE>
	<h2> Update Stock of:</h2>
	<h2>Choose</h2>
	<p>
	<form>
		<input type="button" value="Plants" onclick="window.location.href='http://localhost/updatePlant.php'" />			
		<input type="button" value="Pots" onclick="window.location.href='http://localhost/updatePot.php'" />			
		<input type="button" value="Fertilizer" onclick="window.location.href='http://localhost/updateFert.php'" />			
	</form><br>
	<form method='GET' action='admin.php'>
	<input type='submit' value = 'Back'>
 </form>
	</p>
	</div>
	
	
<?php include('footer.php'); ?>

