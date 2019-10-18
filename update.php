<?php   session_start();?>
<TITLE>Update Plant</TITLE>
<?php include('header.php');?>
	<div class = "left">
	 <center><h2 Class= "Header2"><font color="white">SEARCH BY</font></h2></center>
       	<form action = "" method = "POST">
        <center><label><font color="white">PLANT ID :</font></label><input type = "text" name = "PID" class = "box"/></center><br /><br />
        <center><label><font color="white">NAME  :</font></label><input type = "text" name = "Name" class = "box"/></center><br /><br />
        <center><label><font color="white">SCIENTIFIC NAME  :</font></label><input type = "text" name = "ScName" class = "box"/></center><br /><br />
        <center><label><font color="white">COLOUR  :</font></label><input type = "text" name = "Colour" class = "box"/></center><br /><br />
        <center><input type = "submit" value = " SEARCH"/></center><br />
	<center><h3><font color="white">JUST PRESS SEARCH TO VIEW ENTIRE CATALOG</font></h3></center>
	</form>
	<?php include('footer.php'); ?>

<?php
   //To initiate connection db.php contains connection to nursery details
   include("db.php");

   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $mplantid = mysqli_real_escape_string($conn,$_POST['PID']);
      $mname = mysqli_real_escape_string($conn,$_POST['Name']);
      $msubtype = mysqli_real_escape_string($conn,$_POST['ScName']);
      $mcolour = mysqli_real_escape_string($conn,$_POST['Colour']);

       if($mplantid == '' &&  $mname == '' && $msubtype == '' && $mcolour=='')
      {	
	$sql = "SELECT * FROM plant";
      }
     else  if($mplantid != '' &&  ($mname == '' || $msubtype == '' || $mcolour==''))
      {
     	 $sql = "SELECT * FROM plant WHERE PID='$mplantid' or Name='$mname' or ScName = '$msubtype' or Colour = '$mcolour'";
      }
      
      else 
      {
	 $sql = "SELECT * FROM plant where PlantId='$mplantid' or (Name='$mname' and ScName ='$msubtype' or Colour = '$mcolour')";
      }
      $result = mysqli_query($conn,$sql);
      $num = mysqli_num_rows($result);
      if($num > 0)
      {
	echo "<table border='5' bordercolor='white' style='width:100%' cellspacing='10'>
	<tr>
	<th><font color='white'>PLANT ID</font></th>
	<th><font color='white'>NAME</font></th>
	<th><font color='white'>SCIENTIFIC NAME></font></th>
	<th><font color='white'>COLOUR</font></th>
	<th><font color='white'>QUANTITY</font></th>
	<th><font color='white'>COST</font></th>
	<th><font color='white'>UPDATE QUANTITY</font></th>
	<th><font color='white'>UPDATE PRICE</font></th>
	<th><font color='white'>DELETE</font></th>
	</tr>";

	while($row = mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td><font color='white'>" . $row['PID']."</font></td>";
		echo "<td><font color='white'>" . $row['Name'] . "</font></td>";
		echo "<td><font color='white'>" . $row['ScName'] . "</font></td>";
		echo "<td><font color='white'>" . $row['Colour'] . "</font></td>";
		echo "<td><font color='white'>" . $row['Qty'] . "</font></td>";
		echo "<td><font color='white'>" . $row['Cost'] . "</font></td>";
		echo "<td><form action='edit.php' method='GET'><input type='hidden' name='edit' value='".$row["PID"]."'/><input type='submit' name='submit-btn' value='UPDATE QUANTITY' /></form></td>";
		echo "<td><form action='editp.php' method='GET'><input type='hidden' name='edit' value='".$row["PID"]."'/><input type='submit' name='submit-btn' value = 'UPDATE PRICE' /></form></td>";
		echo "<td><form action= 'delete.php'  method='GET'><input type='hidden' name='edit' value='".$row["PID"]."'/><input type='submit' name='submit-btn' value = 'DELETE' /></form></td>";

		echo "</tr>";
	}
		echo "</table>";
	}
	else{
	$message = "Incorrect Entry.\\nTry again.";
  		echo "<script type='text/javascript'>alert('$message');</script>";
	}
}
?>
<form method='GET' action='updatePlant.php'>
	</br><input type='submit' value = 'BACK'>
	</form>
</div>
