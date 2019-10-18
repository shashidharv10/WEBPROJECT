<?php   session_start();?>
<TITLE>Update Customer</TITLE>
</div>

<?php include('header.php');?>

	<div class = "left">
	 <center><h2 Class= "Header2"><font color="white">UPDATE CUSTOMER INFO</font></h2></center>
       	<form action = "" method = "post">
        <center><label><font color="white">CUSTOMER ID :</font></label><input type = "text" name = "custid" class = "box"/></center><br /><br />
        <center><label><font color="white">PHONE  :</font></label><input type = "text" name = "phone" class = "box"/></center><br /><br />
        
        <center><input type = "submit" value = " SEARCH"/></center><br />
	<center><h3><font color="white">JUST PRESS SEARCH TO VIEW ENTIRE LIST</font></h3></center>
	</form>
	<?php include('footer.php'); ?>

<?php
   //To initiate connection db.php contains connection to nursery details
   include("db.php");

   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $mcustid = mysqli_real_escape_string($conn,$_POST['custid']);

      $mphone = mysqli_real_escape_string($conn,$_POST['phone']);
     // $mcolour = mysqli_real_escape_string($conn,$_POST['colour']);
       if($mcustid == '' && $mphone == '') 
      {	
	$sql = "SELECT * FROM customer";
      }
     else  if($mcustid !='' && $mphone == '')
      {
     	 $sql = "SELECT * FROM customer WHERE CID='$mcustid'  ";
      }
      
      else if($mphone !='' && $mcustid == '')
	{
		 $sql = "SELECT * FROM customer WHERE Phno =$mphone ";
	}
      $result = mysqli_query($conn,$sql);
      $num = mysqli_num_rows($result);
      if($num > 0)
      {
	echo "<table border='1' bordercolor='white' style='width:100%' cellspacing='5'>
	<tr>
	<th><font color='white'>CUSTOMER ID</font></th>
	<th><font color='white'>NAME</font></th>
	<th><font color='white'>PHONE</font></th>
	<th><font color='white'>UPDATE PHONE NO</font></th>
	<th><font color='white'>DELETE</font></th>
	</tr>";

	while($row = mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td align='center'><font color='white'>" . $row['CID']."</font></td>";
		echo "<td align='center'><font color='white'>" . $row['Name'] . "</font></td>";
		echo "<td align='center'><font color='white'>" . $row['Phno'] . "</font></td>";
		echo "<td align='center'><form action='editnumber.php' method='GET'><input type='hidden' name='edit' value='".$row["CID"]."'/><input type='submit' name='submit-btn' value='UPDATE' /></form></td>";
		echo "<td align='center'><form action= 'deletecust.php'  method='GET'><input type='hidden' name='edit' value='".$row["CID"]."'/><input type='submit' name='submit-btn' value = 'DELETE CUSTOMER' /></form></td>";

		echo "</tr>";
	}
		echo "</table>";
	}
	else {
		$message = "Error Occured !!\\nTry Again.";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
}
?>
<br>
<form method='GET' action='custinfemp.php'>
<input type='submit' value = 'BACK'>
		</form>
