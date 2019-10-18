<?php include('header.php');?>
<TITLE>Employee Information</TITLE>
<center><h2><font color='white'>EMPLOYEE DETAILS</font></h2></center>
<?php
	include("db.php");
	$sql = "SELECT * FROM employee";
 	$result = mysqli_query($conn,$sql);
        $num = mysqli_num_rows($result);
	if($num > 0)
      	{
		echo "<table border='5' bordercolor='white' style='width:100%' cellspacing='10'>
		<tr>
		<th><font color='white'>EMPLOYEE ID</font></th>
		<th><font color='white'>NAME</font></th>
		<th><font color='white'>PHONE</font></th>
		<th><font color='white'>SALARY</font></th>
		<th><font color='white'>ADDRESS</font></th>
		<th><font color='white'>DEPARTMENT ID</font></th>
		</tr>";

		while($row = mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo "<td><font color='white'>" . $row['EID']."</font></td>";
			echo "<td><font color='white'>" . $row['Name'] . "</font></td>";
			echo "<td><font color='white'>" . $row['Phno'] . "</font></td>";
			echo "<td><font color='white'>" . $row['Salary'] . "</font></td>";
			echo "<td><font color='white'>" . $row['Address'] . "</font></td>";
			echo "<td><font color='white'>" . $row['DID'] . "</font></td>";

			echo "</tr>";
		}
		echo "</table>";
	}
	else {
	$message = "Error Occured !!\\nTry Again.";
	echo "<script type='text/javascript'>alert('$message');</script>";
	}
?>

<?php include('footer.php');?>
<br /><form method='GET' action='empinf.php'>
	<input type='submit' value = 'BACK'>
</form>
