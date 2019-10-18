<html>
<title>Customer Details</title>
<head>
</head>
<body>
<?php include('header.php'); ?>
	<center><h2><font color="white">ENTER THE CUSTOMER DETAILS TO PROCEED WITH ORDER</font></h2></center>
	<p>
	<form action = "" method = "post">
		<center><label><font color="white">CUSTOMER ID :</font></label><input type = "text" name = "custid" class = "box"/></center><br /><br />
		<center><input type="submit" value="SUBMIT" /></center><br />
	
	</form> 
	</p>
	
	<form>
	<p>
		<center><h2><font color="white">OR</font></h2></center>
		<center><input type="Button" value="ADD NEW CUSTOMER" onclick="window.location.href='http://localhost/AddCustEmp.php'" /></center><br />

	</form> 
	<form method='GET' action='Staff.php'>
	<input type='submit' value = 'BACK'>
	</form>
	</p>

</div>
	
	
<?php include('footer.php'); ?>
<?php 
include("db.php");
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
	$query  = "SELECT MAX(TID) FROM transaction";
		$result  =  mysqli_query($conn,$query);
		$row =  mysqli_fetch_array($result);
		$maxId = $row["MAX(TID)"];
		$newID =  $maxId + 1;
		$_SESSION["new"] = $newID;

      $mcustid = mysqli_real_escape_string($conn,$_POST['custid']);
      if($mcustid == '')
      {	
		$message = "Enter Customer ID or Add New Customer.\\nTry again.";
  		echo "<script type='text/javascript'>alert('$message');</script>";
      }
     else{
     	 $sql = "SELECT * FROM customer where CID='$mcustid'";
      	 $result = mysqli_query($conn,$sql);
     	 $num = mysqli_num_rows($result);
 $id = $_SESSION["new"] ;
	 if($num > 0)
	{
		$message = "Customer Verified.\\n Click Continue";
  		echo "<script type='text/javascript'>alert('$message');</script>";	
		echo "<form method='GET' action='bill.php'>
    		<input type='hidden' name='custid' value='$mcustid'>
		<input type='hidden' name='newid' value='$id'>
    		<input type='submit' value = 'CONTINUE'>
		</form>";
	
	
	}
	else
	{
		$message = "Customer ID not in Database.\\nTry again.";
  		echo "<script type='text/javascript'>alert('$message');</script>";
	}
      
	}
}
?>
