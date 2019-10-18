<?php
session_start();
 include('header.php');
?>
<TITLE>Billing</TITLE>
<center><h2><font color="white">VERIFY CUSTOMER DETAILS</font></h2></center>
<?php
	include('db.php'); 
	if(isset($_GET["custid"]))
	{
	 $mcustid = mysqli_real_escape_string($conn,$_GET['custid']);
	 //echo "$mcustid";
	 $sql = "SELECT * FROM customer WHERE CID = '$mcustid'";
	 $result = mysqli_query($conn,$sql);
	 $num = mysqli_num_rows($result);
	 if($num > 0)
      	{
		echo "<table border='1' '5' bordercolor='white' style='width:100%' cellspacing='5'>
		<tr>
		<th><font color='white'>CUSTOMER ID</font></th>
		<th><font color='white'>NAME</font></th>
		<th><font color='white'>PHONE</font></th>
		<th><font color='white'>ADDRESS</font></th>
		<th><font color='white'>EMPLOYEE ID</font></th>
		</tr>";
		while ($row = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td align='center'><font color='white'>". $row['CID']."</font></td>";
		echo "<td align='center'><font color='white'>" . $row['Name'] . "</font></td>";
		echo "<td align='center'><font color='white'>" . $row['Phno'] . "</font></td>";
		echo "<td align='center'><font color='white'>" . $row['Address'] . "</font></td>";
		echo "<td align='center'><font color='white'>" . $row['EID'] . "</font></td>";
		echo "</tr>";
		echo "</table>";
		}
	}
	 $_SESSION["name"] = $_GET["custid"]; 
	 $_SESSION["new"] = $_GET["newid"];
 	}
	if(isset($_GET["newid"]))
	{
	
	 $_SESSION["new"] = $_GET["newid"];
 	}
	
	include('footer.php');
	$id = $_SESSION["name"];	
	$newid = $_SESSION["new"];
 
	echo "<center><form method='GET' action='index2.php'>
    		<input type='hidden' name='name' value='$id'>
		<input type= 'hidden' name ='newid' value='$newid'>
    		<input type='submit' align ='middle' value = 'CONTINUE'>
		</form></center>";
?>
<form method='GET' action='Staff.php'>
	<input type='submit' value = 'BACK'>
	</form>

