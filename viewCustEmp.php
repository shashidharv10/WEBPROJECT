<?php   session_start();?>


<?php include('header.php');?>

<head>
	<title>Customer Information</title>
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
	$sql = "SELECT * FROM customer";
 	$result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        if($num > 0)
        {
        	echo "<div class='limiter'>
		<div class='container-table100'>
			<div class='wrap-table100'>
				<div class='table100'>
					<span class='contact100-table-title'>
          			CUSTOMER DETAILS
        			</span>
					<table>
						<thead>
							<tr class='table100-head'>
								<th class='column1'>CUSTOMER ID</th>
								<th class='column1'>NAME</th>
								<th class='column1'>PHONE</th>
								<th class='column1'>ADDRESS</th>
								<th class='column2'>EMPLOYEE ASSOCIATED</th>
							</tr>
						</thead>
						<tbody>";

		while($row = mysqli_fetch_array($result))
		{
			echo "<tr>
					<td class='column1'>".$row['CID']."</td>
					<td class='column1'>".$row['Name']."</td>
					<td class='column1'>".$row['Phno'] ."</td>
					<td class='column1'>".$row['Address']."</td>
					<td class='column1'>".$row['EID'] ."</td>
				</tr>";
		}
		echo "	</tbody>
				</table>
				</div>
				</div>
				</div>";
	}
	else {
		$message = "No Records Exist !!\\nTry Again.";
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


<form method='GET' action='custinfemp.html'>
	<input type='submit' value = 'BACK'>
</form>
<?php include('footer.php');?>
