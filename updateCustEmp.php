
<?php   session_start();?>

<?php include('header.php'); ?> 
  

<title>Update Customer</title>
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

<body>


  <div class="container-contact100">
    <div class="wrap-contact100">
      <form class="contact100-form validate-form" action="" method="post">
        <span class="contact100-form-title">
          Update Customer Info
        </span>

        <div class="wrap-input100 validate-input" data-validate="ID is required">
          <span class="label-input100">Customer ID</span>
          <input class="input100" type="text" name="custid" placeholder="Enter customer ID">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Phone number is required">
          <span class="label-input100">Phone Number</span>
          <input class="input100" type="text" name="phone" placeholder="Enter phone number">
          <span class="focus-input100"></span>
        </div>

        <div class="container-contact100-form-btn">
          <div class="wrap-contact100-form-btn">
            <div class="contact100-form-bgbtn"></div>
            <button class="contact100-form-btn">
              <span>
                Search
                <i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>
              </span>
            </button>
          </div>
        </div>

        <span class="contact100-form-title">
          Just Press Search To View The Entire List
        </span>

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

<form method='GET' action='custinfemp.php'>
<input type='submit' value = 'BACK'>
		</form>
<?php include('footer.php'); ?>