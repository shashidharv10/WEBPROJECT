<?php include('header.php'); ?>
<TITLE>Change Password</TITLE>
<?php
   //To initiate connection db.php contains connection to nursery details
   include("db.php");

   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']);
      $newPassword= mysqli_real_escape_string($conn,$_POST['newpassword']);
      $confirmPassword = mysqli_real_escape_string($conn,$_POST['confirmpassword']);

      $sql = "SELECT DID,EID FROM employee WHERE Name = '$myusername' and passwd = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      #$active = $row['active'];
      // If result matched $myusername and $mypassword, table row must be 1 row
       if(mysqli_num_rows($result)==0)
	{
		$message = "Username and/or Password incorrect.\\nTry again.";
  		echo "<script type='text/javascript'>alert('$message');</script>";
	}
	else if($row['DID'] == 1) 
	{
		$inssql = "UPDATE employee SET passwd = '$newPassword' where EID = '$row[EID]'";
		mysqli_query($conn,$inssql);
		if(mysqli_query($conn,$inssql)){
			$message = "Record Updated Successfully";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
		else{
			$message = "Error! \\n Not Able To Update Record";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
      	}
	else {
//         $error = "Your Login Name or Password is invalid";
         	header("location: Staff.php");
	}
   }
?>
             <center><h2 Class= "Header2"><font color ="white"> CHANGE PASSWORD</font></h2></center>
       <form action = "" onsubmit="return checkPwd(this)" method = "post">
		  <center><label><font color="white">USERNAME :</font></label><input type = "text" name = "username" class = "box"/></center><br /><br />
                  <center><label><font color="white">OLD PASSWORD  :</font></label><input type = "password" name = "password" class = "box"/></center><br /><br />
                  <center><label><font color="white">NEW PASSWORD  :</font></label><input type = "password" name = "newpassword" class = "box" /></center><br/><br />
                  <center><label><font color="white">CONFIRM PASSWORD :</font></label><input type = "password"  name= "confirmpassword" class = "box"/></center><br/><br />
		  <center><input type = "submit" value = " SUBMIT "/></center><br />
               </form>
		<br><br>
		<form method='GET' action='admin.php'>
<input type='submit' value = 'BACK'>
</form>
	 </div>
<?php include('footer.php');?>




<script type="text/javascript" language="JavaScript">
function checkPwd(theForm) {
    if (theForm.newpassword.value != theForm.confirmpassword.value)
    {
        alert('Those passwords don\'t match!');
        return false;
    } else {
        return true;
    }
}
</script> 
