<?php   session_start();?>
<TITLE>Filter By Date</TITLE>
<?php include('header.php');?>
	<div class = "left">
	<center><h2 Class= "Header2"><font color="white">CATEGORISE BY DATE</font></h2></center>
	<center><h3 Class= "Header2"><font color="white">ENTER THE DATE IN YYYY-MM-DD FORMAT</font></h3></center>
       	<form action = "" method = "post">
        <center><label><font color="white">DATE AFTER :</font></label><input type = "text" name = "datea" class = "box"/></center><br /><br />
        <center><label><font color="white">DATE BEFORE :</font></label><input type = "text" name = "dateb" class = "box"/></center><br /><br />
	<center><input type = "Submit" value = "SEARCH"/></center><br />
	<center><input type = "Submit" value = "TODAY"></center><br />
	</form>
	<form method='GET' action='Transaction.php'>
	<input type='submit' value = 'BACK'>
	</form>
	<?php include('footer.php'); ?>

<?php
   //To initiate connection db.php contains connection to nursery details
   include("db.php");

   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $mdatea = mysqli_real_escape_string($conn,$_POST['datea']);
      $mdateb = mysqli_real_escape_string($conn,$_POST['dateb']);
      if($mdatea != '' and $mdateb!= '')
      {
	
     	 $sql = "SELECT * FROM transaction WHERE Dateoftrans>='$mdatea' and Dateoftrans<='$mdateb' ";
      }
      else if( $mdatea != '' and $mdateb == '')
	{
     	 $sql = "SELECT * FROM transaction WHERE Dateoftrans>='$mdatea' ";
	}
	else if( $mdatea== '' and $mdateb!='')	
	     	 $sql = "SELECT * FROM transaction WHERE  Dateoftrans<='$mdateb' ";

	else
		$sql = "SELECT * FROM transaction WHERE Dateoftrans>= CURDATE()";  
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

	else {
		$message = "Error no such entry!!\\nTry Again" ;
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
}
?>

</div>
