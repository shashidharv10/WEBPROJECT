<TITLE>Edit Inventory</TITLE>
<?php

	include('db.php');
	if($_GET['edit'])
	{
	$id = $_GET["edit"];
	$_SESSION["newqid"] = $_GET["edit"];
	}

 
?>
<?php include('header.php');?>
<form action="" method="POST">
	<center><label><font color="white">ADD QUANTITY  :</font></label><input type="text" name="newquantity"/></center><br/>
	<center><input type="submit" value=" UPDATE "/></center>
</form>
	<form method='GET' action='update.php'>
	<input type='submit' value = 'BACK'>
</form>

<?php include('footer.php');?>
<?php 	 
if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$iid = $_SESSION["newqid"];
		$quantity = $_POST['newquantity'];
		$sql     = "call UpdInventory('$iid',$quantity)";
		$res 	 = mysqli_query($conn,$sql);
		$message = "Update Successful";
  		echo "<script type='text/javascript'>alert('$message');</script>";
	}
?>

