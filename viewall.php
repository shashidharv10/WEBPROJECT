<?php   session_start();?>
<TITLE>All Info</TITLE>
<?php include('header.php');?>

<?php include('footer.php'); ?>

<?php
   //To initiate connection db.php contains connection to nursery details
   include("db.php");

      $sql = "SELECT * FROM transaction";
 
      $result = mysqli_query($conn,$sql);
      $num = mysqli_num_rows($result);
      if($num > 0)
      {
	echo "<table border='5' bordercolor='white' style='width:100%' cellspacing='10'>
	<tr>
	<th><font color='white'>TRANSACTION ID</font></th>
	<th><font color='white'>CUSTOMER ID</font></th>
	<th><font color='white'>PLANT ID</font></th>
	<th><font color='white'>DATE OF TRANSACTION</font></th>
	<th><font color='white'>QUANTITY</font></th>
	<th><font color='white'>AMOUNT</font></th>
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
	}
		echo "</table>";
	

	}

	else {
		$message = "Error!!\\n No Entires Exist!!" ;
		echo "<script type='text/javascript'>alert('$message');</script>";
	}

?>
<form method='GET' action='Transaction.php'>
	</br><input type='submit' value = 'BACK'>
	</form>
