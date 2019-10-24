<?php

	include('db.php');
	if($_GET['edit'])
	{
	$id = $_GET["edit"];

	}

 
?>
<?php include('header.php');?>

<head>
<title>Edit Plant</title>
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
          Update Price Of Plant
        </span>

        <div class="wrap-input100 validate-input" data-validate="Number is required">
          <span class="label-input100">New Price</span>
          <input class="input100" type="text" name="newprice" placeholder="Enter new price of plant">
          <span class="focus-input100"></span>
        </div>

        <div class="container-contact100-form-btn">
          <div class="wrap-contact100-form-btn">
            <div class="contact100-form-bgbtn"></div>
            <button class="contact100-form-btn">
              <span>
                Update
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


<?php 	 
if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		
		$price = $_POST['newprice'];
		$sql   = "UPDATE plant SET Cost=$price  WHERE PID='$id'";
		$res 	= mysqli_query($conn,$sql);
		if ($price<=0)
		{
			$message = "Price cannot be 0 or less.\\n A default price of 30 inserted through trigger";
		}
		else 
		{
			$message = "Update Successful";
		}
  		echo "<script type='text/javascript'>alert('$message');</script>";
	}
 
?>

<form method='GET' action='update.php'>
    <div class="container-contact100-form-btn">
        <div class="wrap-contact100-form-btn">
            <div class="contact100-form-bgbtn"></div>
            <button class="contact100-form-btn">
              <span>
                <i class="fa fa-long-arrow-left m-l-7" aria-hidden="true"></i>
                BACK
              </span>
            </button>
        </div>
    </div>
</form>
<?php include('footer.php');?>
