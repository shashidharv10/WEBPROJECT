<?php
   //To initiate connection db.php contains connection to nursery details
   include("db.php");
   
   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $mcustid = mysqli_real_escape_string($conn,$_POST['custid']);
      $mname = mysqli_real_escape_string($conn,$_POST['name']);
      $mphone = mysqli_real_escape_string($conn,$_POST['phone']);
      $maddress = mysqli_real_escape_string($conn,$_POST['address']);
      $meid = mysqli_real_escape_string($conn,$_POST['empid']);
      $sql = "SELECT Name FROM customer WHERE CID = '$mcustid' or (Name='$mname' and Phno='$mphone' and Address = '$maddress')";
      $result = mysqli_query($conn,$sql);
      $num = mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row
      	if($num ==0 and $mcustid!='' and $mname!='' and $mphone !='' and $maddress!='')
	{
		$insql = "INSERT INTO customer VALUES('$mcustid','$mname','$mphone','$maddress','$meid')";
		mysqli_query($conn,$insql);
		$message = "Update Sucessful";
  		echo "<script type='text/javascript'>alert('$message');</script>";
	}
	else
	{
		$message = "Insertion Unsuccesful.\\nTry Again";
  		echo "<script type='text/javascript'>alert('$message');</script>";

      	}
   }
?>
<?php include('header.php'); ?>
	<TITLE>Add Customer</TITLE>
	     <center><h2 Class= "Header2"><font color="white">ADD CUSTOMER</font></h2></center>
             <center><h3 Class= "Header2"><font color="white">ENTER DETAILS</font></h3></center>
       <form action = "" method = "post">
                  <center><label><font color="white">CUSTOMER ID :</font></label><input type = "text" name = "custid" class = "box"/></center><br /><br />
                  <center><label><font color="white">NAME  :</font></label><input type = "text" name = "name" class = "box"/></center><br /><br />
                  <center><label><font color="white">PHONE :</font></label><input type = "text" name = "phone" class = "box"/></center><br /><br />
                  <center><label><font color="white">ADDRESS  :</font></label><input type = "text" name = "address" class = "box"/></center><br /><br />
		  <center><label><font color="white">EMPLOYEE ID  :</font></label><input type = "text" name = "empid" class = "box"/></center><br /><br />
                  <center><input type = "submit" value = " SUBMIT"/></center><br />
               </form>
		<form method='GET' action='custinf.php'>
	<input type='submit' value = 'BACK'>
	</form>
<?php include('footer.php'); ?>

