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
             
		<title>Change Password</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="Login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="Login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="Login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="Login/fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="Login/vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="Login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="Login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="Login/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="Login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="Login/css/util.css">
  <link rel="stylesheet" type="text/css" href="Login/css/main.css">
<!--===============================================================================================-->
</head>
<body>
  
  
  <div class="container-login100" style="background-image: url('Login/images/plant1.jpg');">
    <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
      <form class="login100-form validate-form" action = "" method = "post">
        <span class="login100-form-title p-b-37">
          Change Password
        </span>

        <div class="wrap-input100 validate-input m-b-20" data-validate="Enter username">
          <input class="input100" type="text" name="username" placeholder="username">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
          <input class="input100" type="password" name="password" placeholder="Old Password">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
          <input class="input100" type="password" name="newpassword" placeholder="New Password">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
          <input class="input100" type="password" name="confirmpassword" placeholder="Confirm New Password">
          <span class="focus-input100"></span>
        </div>

        <div class="container-login100-form-btn">
          <button class="login100-form-btn">
            Change Password
          </button>
        </div>

      </form>

      
    </div>
  </div>
  
  

  <div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
  <script src="Login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="Login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="Login/vendor/bootstrap/js/popper.js"></script>
  <script src="Login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="Login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="Login/vendor/daterangepicker/moment.min.js"></script>
  <script src="Login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="Login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="Login/js/main.js"></script>




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



<form method='GET' action='admin.html'>
<input type='submit' value = 'BACK'>
</form>
<?php include('footer.php');?>
