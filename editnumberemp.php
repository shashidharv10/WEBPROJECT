<TITLE>Edit Employee</TITLE>
<?php

	include('db.php');
	if($_GET['edit'])
	{
	$id = $_GET["edit"];
	}

 
?>
<?php include('header.php');?>
<form action="" method="POST">
<center><h2><font color="white">UPDATE PHONE NUMBER</font></h2></center>
<center><label><font color="white">NEW NUMBER :</font></label><input type="text" name="newnumber"/></center><br />
<center><input type="submit" value="UPDATE"/></center>
</form>
<?php include('footer.php');?>
<?php 	 
if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$number = $_POST['newnumber'];
		//$price  	 = $_POST['newprice'];
		$sql     = "UPDATE employee SET PhNo=$number  WHERE EID='$id'";
		$res 	 = mysqli_query($conn,$sql);
			$message = "UPDATE SUCCESSFUL";
  		echo "<script type='text/javascript'>alert('$message');</script>";
	}
 
?>
<form method='GET' action='empinf.php'>
<input type='submit' value = 'BACK'>
		</form>

