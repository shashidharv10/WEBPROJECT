<?php   session_start();?>
<TITLE>Update Employee</TITLE>
<?php include('header.php');?>
<p>
	<div class = "left">
	 <center><h2 Class= "Header2"><font color="white">UPDATE EMPLOYEE INFORMATION</font</h2></center>
       	<form action = "" method = "post">
        <center><label>EMPLOYEE ID :</label><input type = "text" name = "empid" class = "box"/></center><br /><br />
        <center><label>PHONE  :</label><input type = "text" name = "phone" class = "box"/></center><br /><br />
        
        <center><input type = "submit" value = " SEARCH"/></center><br />
	<center><h3><font color="white">JUST PRESS SEARCH TO VIEW THE ENTIRE LIST</font></h3></center>
	</form>
</p>
	<?php include('footer.php'); ?>

<?php
   //To initiate connection db.php contains connection to nursery details
   include("db.php");

   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $mempid = mysqli_real_escape_string($conn,$_POST['empid']);

      $mphone = mysqli_real_escape_string($conn,$_POST['phone']);
     // $mcolour = mysqli_real_escape_string($conn,$_POST['colour']);
       if($mempid == '' && $mphone == '') 
      {	
	$sql = "SELECT * FROM employee";
      }
     else  if($mempid !='' && $mphone == '')
      {
     	 $sql = "SELECT * FROM employee where EID='$mempid'  ";
      }
      
      else if($mphone !='' && $mempid == '')
	{
		 $sql = "SELECT * FROM employee where Phno =$mphone ";
	}
      $result = mysqli_query($conn,$sql);
      $num = mysqli_num_rows($result);
      if($num > 0)
      {
	echo "<table border='5' bordercolor='white' style='width:100%' cellspacing='5'>
	<tr>
	<th><font color='white'>EMPLOYEE ID</font></th>
	<th><font color='white'>NAME</font></th>
	<th><font color='white'>PHONE</font></th>
	<th><font color='white'>UPDATE PHONE NO</font></th>
	<th><font color='white'>DELETE</font></th>
	</tr>";

	while($row = mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td><font color='white'>" . $row['EID']."</font></td>";
		echo "<td><font color='white'>" . $row['Name'] . "</font></td>";
		echo "<td><font color='white'>" . $row['Phno'] . "</font></td>";
		echo "<td><form action='editnumberemp.php' method='GET'><input type='hidden' name='edit' value='".$row["EID"]."'/><input type='submit' name='submit-btn' value='UPDATE' /></form></td>";
		echo "<td><form action= 'deleteemp.php'  method='GET'><input type='hidden' name='edit' value='".$row["EID"]."'/><input type='submit' name='submit-btn' value = 'DELETE EMPLOYEE' /></form></td>";

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
</div>
<form method='GET' action='empinf.php'>
	</br><input type='submit' value = 'BACK'>
</form>


