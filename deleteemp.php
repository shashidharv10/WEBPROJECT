<?php 	
	include('header.php');
	include('db.php'); 
	if(isset($_GET['edit']))
	{
		$id = $_GET["edit"];
		$sql     = "DELETE FROM employee WHERE EID='$id'";
		$res 	 = mysqli_query($conn,$sql);
		$message = "Deletion Successful";
  		echo "<script type='text/javascript'>alert('$message');</script>";
	}
?>

<form method='GET' action='updateEmp.php'>
<input type='submit' value = 'BACK'>
		</form>


