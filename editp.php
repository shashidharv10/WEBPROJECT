<TITLE>Edit Plant</TITLE>
<?php

	include('db.php');
	if($_GET['edit'])
	{
	$id = $_GET["edit"];

	}

 
?>
<?php include('header.php');?>
<form action="" method="POST">
<center><label><font color="white">NEW PRICE :</font></label><input type="text" name="newprice"/></center><br />
<center><input type="submit" value=" UPDATE"/></center>
</form>
<form method='GET' action='update.php'>
<input type='submit' value = 'BACK'>
		</form>
<?php include('footer.php');?>
<?php 	 
if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		
		$price = $_POST['newprice'];
		$sql   = "UPDATE plant SET Cost=$price  WHERE PID='$id'";
		$res 	= mysqli_query($conn,$sql);
		if ($mprice<=0)
		{
			$message = "Price cannot be 0 or less.\\n A default price of 30 inserted through trigger";
		}
		else 
		{
			$message = "Update Successful";
		}
  		echo "<script type='text/javascript'>alert('$message');</script>";
	}
 
?>
