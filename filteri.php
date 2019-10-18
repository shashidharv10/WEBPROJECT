<?php   session_start();?>

<?php include('header.php');?>
	<div class = "left">
	<center><h2 Class= "Header2"><font color="white">CATEGORISE BY PLANT ID</font></h2></center>
       	<form action = "" method = "post">
        <center><label><font color="white">PLANT ID :</font></label><input type = "text" name = "item" class = "box"/></center><br /><br />
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

      $mitem = mysqli_real_escape_string($conn,$_POST['item']);
      $sql = "SELECT * FROM transaction where PID = '$mitem'  ";
 
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
	<th><font color='white'>DATE OF TRANSACTIO</font></th>
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

	else{
		$message = "Error no such entry!!\\nTry Again";
  		echo "<script type='text/javascript'>alert('$message');</script>" ;}


}
?>

</div>
