<?php
   //To initiate connection db.php contains connection to nursery details
   include("db.php");

   session_start();

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form

      $mplantid = mysqli_real_escape_string($conn,$_POST['plantid']);
      $mname = mysqli_real_escape_string($conn,$_POST['name']);
      $mscname = mysqli_real_escape_string($conn,$_POST['scientificname']);
      $mcolour = mysqli_real_escape_string($conn,$_POST['colour']);
      $mdate = mysqli_real_escape_string($conn,$_POST['date']);
      $mprice = mysqli_real_escape_string($conn,$_POST['price']);
      $mstage = mysqli_real_escape_string($conn,$_POST['stage']);
      $mcquantity = mysqli_real_escape_string($conn,$_POST['cquantity']);
      $mimage = mysqli_real_escape_string($conn,$_POST['image']);
      $sql = "SELECT Name FROM plant WHERE PID = '$mplantid' or (Name='$mname' and ScName='$mscname' and Colour = '$mcolour')";
      $result = mysqli_query($conn,$sql);
      $num = mysqli_num_rows($result);
      // If result matched $myusername and $mypassword, table row must be 1 row
      	if($num ==0 and $mplantid!='' and $mname!='' and $mcquantity !='' and $mprice!='')
	{
		$insql = "INSERT INTO plant VALUES('$mplantid','$mname','$mscname','$mcolour','$mdate',$mprice,'$mstage',$mcquantity,'$mimage')";
		mysqli_query($conn,$insql);
		if ($mprice<=0)
		{
			$message = "Price cannot be 0 or less.\\n A default price of 30 inserted through trigger";
		}
		else 
		{
			$message = "Insertion Successful";
		}
  		echo "<script type='text/javascript'>alert('$message');</script>";
	}
	else
	{
		$message = "Insertion Unsuccesful.\\n Try Again!!.";
  		echo "<script type='text/javascript'>alert('$message');</script>";

      	}
   }
?>
<?php include('header.php'); ?>


  <title>Add Plant</title>
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
          Add Plant
        </span>

        <div class="wrap-input100 validate-input" data-validate="ID is required">
          <span class="label-input100">Plant ID</span>
          <input class="input100" type="text" name="plantid" placeholder="Enter plant ID">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate = "Name is required">
          <span class="label-input100">Name</span>
          <input class="input100" type="text" name="name" placeholder="Enter plant name">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Scientific Name is required">
          <span class="label-input100">Scientific Name</span>
          <input class="input100" type="text" name="scientificname" placeholder="Enter scientific name">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate = "Colour is required">
          <span class="label-input100">Colour</span>
          <input class="input100" type="text" name="colour" placeholder="Enter plant colour">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Date is required">
          <span class="label-input100">Date of Sowing</span>
          <input class="input100" type="text" name="date" placeholder="Enter date yyyy-mm-dd">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate = "Price is required">
          <span class="label-input100">Price</span>
          <input class="input100" type="text" name="price" placeholder="Enter the price">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate = "Stage is required">
          <span class="label-input100">Stage of Growth</span>
          <input class="input100" type="text" name="stage" placeholder="Enter plant/sapling">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate = "Quantity is required">
          <span class="label-input100">Quantity</span>
          <input class="input100" type="text" name="cquantity" placeholder="Enter the quantity">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate = "Image Path is required">
          <span class="label-input100">Image Path</span>
          <input class="input100" type="text" name="image" placeholder="Enter image path">
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

	<form method='GET' action='updatePlant.html'>
	<input type='submit' value = 'BACK'>
 	</form>
	</p>
<?php include('footer.php'); ?>
