
<?php include("db.php"); ?>

<?php include("header.php"); ?>


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

<?php if(isset($_GET["custid"]))
{
  
 $_SESSION["name"] = $_GET["custid"]; 
 
}
if(isset($_GET["newid"]))
{
  $_SESSION["new"] = $_GET["newid"];
}
$id = $_SESSION["name"];
$trid = $_SESSION["new"];
$sql = "SELECT * FROM transaction where TID = '$trid' and CID = '$id'";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
	
if($num > 0)
{

		echo "<div class='limiter'>
		<div class='container-table100'>
			<div class='wrap-table100'>
				<div class='table100'>
					<span class='contact100-table-title'>
          			BILL DETAILS
        			</span>
					<table>
						<thead>
							<tr class='table100-head'>
								<th class='column1'>TRANSACTION ID</th>
								<th class='column1'>CUSTOMER ID</th>
								<th class='column1'>PLANT ID</th>
								<th class='column1'>TIME STAMP</th>
								<th class='column1'>QUANTITY</th>
								<th class='column1'>AMOUNT</th>
							</tr>
						</thead>
						<tbody>";
	while($row = mysqli_fetch_array($result))
	{

		echo "<tr>
					<td class='column1'>".$row['TID']."</td>
					<td class='column1'>".$row['CID']."</td>
					<td class='column1'>".$row['PID'] ."</td>
					<td class='column1'>".$row['Dateoftrans'] ."</td>
					<td class='column1'>".$row['Qty']."</td>
					<td class='column1'>".$row['Amount'] ."</td>
				</tr>";
		$x = $row['PID'];
		$y = $row['Qty'];
		$sql = "call SubInventoryP('$x',$y)";
		mysqli_query($conn,$sql);	
	}
	echo "</table>";
	$message = "Bill Successfully Recorded";
	echo "<script type='text/javascript'>alert('$message');</script>";
}
else {
		$message = "Error occured in transaction.\\n Try Again !!";
		echo "<script type='text/javascript'>alert('$message');</script>";
}
?>

<!--===============================================================================================-->	
	<script src="Table/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="Table/vendor/bootstrap/js/popper.js"></script>
	<script src="Table/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="Table/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="Table/js/main.js"></script>
<br>
<form action = "Staff.html" method = "post">
		<center><button class="btn btn-success" type="submit">Continue</button></center>
<!-- <input type="Submit" value="GO BACK TO HOME PAGE" /></center> -->
<br />	
</form> 

<?php include("footer.php"); ?>
