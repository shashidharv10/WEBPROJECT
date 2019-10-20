<?php include('header.php'); ?> 


<head>
	<title>Bill Window</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="Table/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Table/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Table/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================Table/================================================-->
	<link rel="stylesheet" type="text/css" href="Table/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Table/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Table/vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="Table/css/util.css">
	<link rel="stylesheet" type="text/css" href="Table/css/main.css">
<!--===============================================================================================-->
</head>
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

<form method='GET' action='CustomerInfo.php'>
	<input type='submit' value = 'BACK'>
</form>
<?php include('footer.php'); ?>