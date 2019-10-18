<?php include("header.php"); ?>
<?php include("footer.php");
	include("db.php"); ?>

<TITLE>Bill Window</TITLE>
<center><b><h2><font color="white">INVOICE</font></h2></b></center>
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
	echo "<table border='5' bordercolor='white' style='width:100%' cellspacing='10'>
		<tr>
		<th><font color='white'><b>TRANSACTION ID</b></font></th>
		<th><font color='white'><b>CUSTOMER ID</b></font></th>
		<th><font color='white'><b>PLANT ID</b></font></th>
		<th><font color='white'><b>TIME STAMP</b></font></th>
		<th><font color='white'><b>QUANTITY</b></font></th>
		<th><font color='white'><b>AMOUNT</b></font></th>
		</tr>";
	while($row = mysqli_fetch_array($result))
	{
		echo "<tr>";
			echo "<td align='center'><font color='white'>" . $row['TID']."</font></td>";
			echo "<td align='center'><font color='white'>" . $row['CID'] . "</font></td>";
			echo "<td align='center'><font color='white'>" . $row['PID'] . "</font></td>";
			echo "<td align='center'><font color='white'>" . $row['Dateoftrans'] . "</font></td>";
			echo "<td align='center'><font color='white'>" . $row['Qty'] . "</font></td>";
			echo "<td align='center'><font color='white'>" . $row['Amount'] . "</font></td>";

		echo "</tr>";
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
<form action = "Staff.php" method = "post">
		
		<br /><center><input type="Submit" value="GO BACK TO HOME PAGE" /></center><br />
	
</form> 
