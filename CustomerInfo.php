
<?php include('header.php'); ?> 
  

<title>Customer Details</title>
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
          Enter Customer Details First
        </span>

        <div class="wrap-input100 validate-input" data-validate="ID is required">
          <span class="label-input100">Customer ID</span>
          <input class="input100" type="text" name="custid" placeholder="Enter customer ID">
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
          OR
        </span>
    </form>

    <form class="contact100-form validate-form" action="http://localhost/AddCustEmp.php">
        <div class="container-contact100-form-btn">
          <div class="wrap-contact100-form-btn">
            <div class="contact100-form-bgbtn"></div>
            <button class="contact100-form-btn" type="submit">
              <span>
                Add New Customer
                <!--<i class="fa fa-long-arrow-right m-l-7" aria-hidden="true"></i>-->
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

<?php 
include("db.php");
	
	if($_SERVER["REQUEST_METHOD"] == "POST") {
	$query  = "SELECT MAX(TID) FROM transaction";
		$result  =  mysqli_query($conn,$query);
		$row =  mysqli_fetch_array($result);
		$maxId = $row["MAX(TID)"];
		$newID =  $maxId + 1;
		$_SESSION["new"] = $newID;

      $mcustid = mysqli_real_escape_string($conn,$_POST['custid']);
      if($mcustid == '')
      {	
		$message = "Enter Customer ID or Add New Customer.\\nTry again.";
  		echo "<script type='text/javascript'>alert('$message');</script>";
      }
     else{
     	 $sql = "SELECT * FROM customer where CID='$mcustid'";
      	 $result = mysqli_query($conn,$sql);
     	 $num = mysqli_num_rows($result);
 $id = $_SESSION["new"] ;
	 if($num > 0)
	{
		$message = "Customer Verified.\\n Click Continue";
  		echo "<script type='text/javascript'>alert('$message');</script>";	
		
    echo "<form class='contact100-form validate-form' action='bill.php'>
        <div class='container-contact100-form-btn'>
          <div class='wrap-contact100-form-btn'>
            <div class='contact100-form-bgbtn'></div>
            <input type='hidden' name='custid' value='$mcustid'>
            <input type='hidden' name='newid' value='$id'>
            <button class='contact100-form-btn' type='submit'>
              <span>
                Continue
              </span>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>";
	
	
	}
	else
	{
		$message = "Customer ID not in Database.\\nTry again.";
  		echo "<script type='text/javascript'>alert('$message');</script>";
	}
      
	}
}
?>

<form method='GET' action='Staff.html'>
	<input type='submit' value = 'BACK'>
</form>
<?php include('footer.php'); ?>
