<?php   session_start();?>
<TITLE>Customer Information</TITLE>
<?php include('header.php');?>
<TITLE>Customer Info</TITLE>
<center><h2><font color='white'>PLANT DETAILS</font></h2></center>
<?php
	include("db.php");
	$sql = "SELECT * FROM plant";
 	$result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
        if($num > 0)
        {
		echo "<table border='5' bordercolor='white' style='width:100%' cellspacing='10'>
		<tr>
		<th><font color='white'><b>PLANT ID</b></font></th>
		<th><font color='white'><b>NAME</b></font></th>
		<th><font color='white'><b>SCIENTIFIC NAME</b></font></th>
		<th><font color='white'><b>COLOR</b></font></th>
		<th><font color='white'><b>DATE OF SOWING</b></font></th>
		<th><font color='white'><b>COST</b></font></th>
		<th><font color='white'><b>STAGE</b></font></th>
		<th><font color='white'><b>QUANTITY</b></font></th>
		</tr>";

		while($row = mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo "<td align='center'><font color='white'>" . $row['PID']."</font></td>";
			echo "<td align='center'><font color='white'>" . $row['Name'] . "</font></td>";
			echo "<td align='center'><font color='white'>" . $row['ScName'] . "</font></td>";
			echo "<td align='center'><font color='white'>" . $row['Colour'] . "</font></td>";
			echo "<td align='center'><font color='white'>" . $row['Dateofsowing'] . "</font></td>";
			echo "<td align='center'><font color='white'>" . $row['Cost'] . "</font></td>";
			echo "<td align='center'><font color='white'>" . $row['Stage'] . "</font></td>";
			echo "<td align='center'><font color='white'>" . $row['Qty'] . "</font></td>";

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
<br /><form method='GET' action='updatePlant.php'>
	<input type='submit' value = 'BACK'>
</form>
