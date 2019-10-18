<?php
   //To initiate connection db.php contains connection to nursery details
   include("db.php");

   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $mempid = mysqli_real_escape_string($conn,$_POST['empid']);
      $mdid = mysqli_real_escape_string($conn,$_POST['did']);
      $mname = mysqli_real_escape_string($conn,$_POST['name']);
      $mphone = mysqli_real_escape_string($conn,$_POST['phone']);
      $maddress = mysqli_real_escape_string($conn,$_POST['address']);
      $msalary = mysqli_real_escape_string($conn,$_POST['sal']);
      $mpassword = mysqli_real_escape_string($conn,$_POST['password']);
      $sql = "SELECT Name FROM employee WHERE EID = '$mempid'";
      $result = mysqli_query($conn,$sql);
      $num = mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row
      	if($num ==0 and $mempid!='' and $mdid !='' and $mname!='' and $mpassword!='' and $mphone!='' and $maddress!='' and $msalary!='')
	{
		$insql = "INSERT INTO employee VALUES('$mempid','$mname','$mphone','$maddress','$msalary','$mdid','$mpassword')";
		mysqli_query($conn,$insql);
		$message = "Insertion Sucessful";
  		echo "<script type='text/javascript'>alert('$message');</script>";
	}
	else
	{
		$message = "Insertion Unsuccesful.\\nTry Again.";
  		echo "<script type='text/javascript'>alert('$message');</script>";

      	}
   }
?>
<?php include('header.php'); ?>
	<TITLE>Add Employee</TITLE>
             <center><h2 Class= "Header2"><font color="white">ENTER DETAILS</font></h2></center>
	<p>
       <form action = "" method = "post">
                  <center><label><font color="white">EMPLOYEE ID :</font></label><input type = "text" name = "empid" class = "box"/></center><br /><br />
		  <center><label><font color="white">DEPARTMENT ID :</font></label><input type = "text" name = "did" class = "box"/></center><br /><br />
                  <center><label><font color="white">NAME  :</font></label><input type = "text" name = "name" class = "box"/></center><br /><br />
                  <center><label><font color="white">PHONE NUMBER :</font></label><input type = "text" name = "phone" class = "box"/></center><br /><br />
		  <center><label><font color="white">ADDRESS :</font></label><input type = "text" name = "address" class = "box"/></center><br /><br />
		  <center><label><font color="white">SALARY :</font></label><input type = "text" name = "sal" class = "box"/></center><br /><br />
                  <center><label><font color="white">PASSWORD :</font></label><input type = "password" name = "password" class = "box"/></center><br /><br />
                  <center><input type = "submit" value = " SUBMIT "/></center><br />
               </form>
	<form method='GET' action='empinf.php'>
	<input type='submit' value = 'BACK'>
 	</form>
	</p>
<?php include('footer.php'); ?>

