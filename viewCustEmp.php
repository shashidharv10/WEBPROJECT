<?php   session_start();?>
<TITLE>Customer Information</TITLE>
<?php include('header.php');?>
<TITLE>Customer Info</TITLE>
<center><h2><font color='white'>CUSTOMER DETAILS</font></h2></center>
<?php
	include("db.php");
	$sql = "SELECT * FROM customer";
 	$result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        if($num > 0)
        {
		echo "<table border='5' bordercolor='white' style='width:100%' cellspacing='10'>
		<tr>
		<th><font color='white'><b>CUSTOMER ID</b></font></th>
		<th><font color='white'><b>NAME</b></font></th>
		<th><font color='white'><b>PHONE</b></font></th>
		<th><font color='white'><b>ADDRESS</b></font></th>
		<th><font color='white'><b>EMPLOYEE ASSOCIATED</b></font></th>
		</tr>";

		while($row = mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo "<td align='center'><font color='white'>" . $row['CID']."</font></td>";
			echo "<td align='center'><font color='white'>" . $row['Name'] . "</font></td>";
			echo "<td align='center'><font color='white'>" . $row['Phno'] . "</font></td>";
			echo "<td align='center'><font color='white'>" . $row['Address'] . "</font></td>";
			echo "<td align='center'><font color='white'>" . $row['EID'] . "</font></td>";

			echo "</tr>";
		}
		echo "</table>";
	}
	else {
		$message = "No Records Exist !!\\nTry Again.";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
?>

<?php include('footer.php');?>
<br /><form method='GET' action='custinfemp.php'>
	<input type='submit' value = 'BACK'>
</form>
