<?php 	
	include('db.php'); 
	include('header.php');
	if(isset($_GET['edit']))
	{
		$id = $_GET["edit"];
		$sql     = "DELETE FROM plant WHERE PID='$id'";
		$res 	 = mysqli_query($conn,$sql);
		$message = "Deletion Successful";
  		echo "<script type='text/javascript'>alert('$message');</script>";
	}
	
	
?>
<form method='GET' action='update.php'>
	<input type='submit' value = 'BACK'>
	</form>
