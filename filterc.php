<?php   session_start();?>
<TITLE>Filter By CID</TITLE>
<?php include('header.php');?>
	<div class = "left">
	<center><h2 Class= "Header2"><font color="white">SEARCH</font></h2></center>
       	<form action = "" method = "post">
        <center><label><font color="white">CUSTOMER ID :</font></label><input type = "text" name = "custid" class = "box"/></center><br /><br />
	<center><input type = "Submit" value = "SEARCH"/></center><br />
        </form>
	<form method='GET' action='Transaction.php'>
	<input type='submit' value = 'BACK'>
	</form>
	<?php include('footer.php'); ?>

<?php
   //To initiate connection db.php contains connection to nursery details
   include("db.php");

   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $mcustid = mysqli_real_escape_string($conn,$_POST['custid']);
      if($mcustid != '')
      {
	
     	 $sql = "SELECT * FROM transaction WHERE CID='$mcustid' ";
      	$result = mysqli_query($conn,$sql);
      	$num = mysqli_num_rows($result);
      if($num > 0)
      {
	echo "<table border='5' bordercolor='white' style='width:100%' cellspacing='5'>
	<tr>
	<th><font color='white'>TRANSACTION ID</font></th>
	<th><font color='white'>CUSTOMER ID</font></th>
	<th><font color='white'>PLANT ID</font></th>
	<th><font color='white'>QUANTITY</font></th>
	<th><font color='white'>DATE OF TRANSACTION</font></th>
	<th><font color='white'>AMOUNT</font></th>
	</tr>";

	while($row = mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td align='center'><font color='white'>" . $row['TID']."</font></td>";
		echo "<td align='center'><font color='white'>" . $row['CID'] . "</font></td>";
		echo "<td align='center'><font color='white'>" . $row['PID'] . "</font></td>";
		echo "<td align='center'><font color='white'>" . $row['Qty'] . "</font></td>";
		echo "<td align='center'><font color='white'>" . $row['Dateoftrans'] . "</font></td>";
		echo "<td align='center'><font color='white'>" . $row['Amount'] . "</font></td>";

		echo "</tr>";
	}
		echo "</table>";
	}
	}

	else{
		$message = "Error no such entry!!\\nTry Again" ;
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
}
?>

</div>
