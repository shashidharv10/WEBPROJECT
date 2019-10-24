
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
  

<title>Add Customer</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
  <link rel="icon" type="image/png" href="ContactForm/images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="ContactForm/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="ContactForm/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="ContactForm/vendor/animate/animate.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="ContactForm/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="ContactForm/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="ContactForm/vendor/select2/select2.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="ContactForm/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="ContactForm/css/util.css">
  <link rel="stylesheet" type="text/css" href="ContactForm/css/main.css">
<!--===============================================================================================-->
</head>
<body>


  <div class="container-contact100">
    <div class="wrap-contact100">
      <form class="contact100-form validate-form" action="" method="post">
        <span class="contact100-form-title">
          Add Customer
        </span>

        <div class="wrap-input100 validate-input" data-validate="ID is required">
          <span class="label-input100">Customer ID</span>
          <input class="input100" type="text" name="custid" placeholder="Enter customer ID">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate = "Name is required">
          <span class="label-input100">Name</span>
          <input class="input100" type="text" name="name" placeholder="Enter your name">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Phone number is required">
          <span class="label-input100">Phone Number</span>
          <input class="input100" type="text" name="phone" placeholder="Enter phone number">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate = "Employee ID required">
          <span class="label-input100">Employee ID</span>
          <input class="input100" type="text" name="empid" placeholder="Enter Employee ID">
          <span class="focus-input100"></span>
        </div>

        
        <div class="wrap-input100 validate-input" data-validate = "Address is required">
          <span class="label-input100">Address</span>
          <textarea class="input100" name="address" placeholder="Your address here..."></textarea>
          <span class="focus-input100"></span>
        </div>

        <div class="container-contact100-form-btn">
          <div class="wrap-contact100-form-btn">
            <div class="contact100-form-bgbtn"></div>
            <button class="contact100-form-btn">
              <span>
                Submit
                <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
              </span>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>



<!--===============================================================================================-->
  <script src="ContactForm/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="ContactForm/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="ContactForm/vendor/bootstrap/js/popper.js"></script>
  <script src="ContactForm/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="ContactForm/vendor/select2/select2.min.js"></script>
  <script>
    $(".selection-2").select2({
      minimumResultsForSearch: 20,
      dropdownParent: $('#dropDownSelect1')
    });
  </script>
<!--===============================================================================================-->
  <script src="ContactForm/vendor/daterangepicker/moment.min.js"></script>
  <script src="ContactForm/vendor/daterangepicker/daterangepicker.js"></script>
<!--===========ContactForm/====================================================================================-->
  <script src="ContactForm/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="ContactForm/js/main.js"></script>

		<form method='GET' action='custinf.html'>
	<input type='submit' value = 'BACK'>
	</form>
<?php include('footer.php'); ?>
