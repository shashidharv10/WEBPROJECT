<?php   session_start();?>

<?php
   //To initiate connection db.php contains connection to nursery details
   include("db.php");

   if($_SERVER["REQUEST_METHOD"] == "POST") {

      $mplantid = mysqli_real_escape_string($conn,$_POST['PID']);
      $mname = mysqli_real_escape_string($conn,$_POST['Name']);
      $msubtype = mysqli_real_escape_string($conn,$_POST['ScName']);
      $mcolour = mysqli_real_escape_string($conn,$_POST['Colour']);

       if($mplantid == '' &&  $mname == '' && $msubtype == '' && $mcolour=='')
      {	
	$sql = "SELECT * FROM plant";
      }
     else  if($mplantid != '' &&  ($mname == '' || $msubtype == '' || $mcolour==''))
      {
     	 $sql = "SELECT * FROM plant WHERE PID='$mplantid' or Name='$mname' or ScName = '$msubtype' or Colour = '$mcolour'";
      }
      
      else 
      {
	 $sql = "SELECT * FROM plant where PlantId='$mplantid' or (Name='$mname' and ScName ='$msubtype' or Colour = '$mcolour')";
      }
      $result = mysqli_query($conn,$sql);
      $num = mysqli_num_rows($result);
      if($num > 0)
      {
	echo "<table border='5' bordercolor='white' style='width:100%' cellspacing='10'>
	<tr>
	<th><font color='white'>PLANT ID</font></th>
	<th><font color='white'>NAME</font></th>
	<th><font color='white'>SCIENTIFIC NAME></font></th>
	<th><font color='white'>COLOUR</font></th>
	<th><font color='white'>QUANTITY</font></th>
	<th><font color='white'>COST</font></th>
	<th><font color='white'>UPDATE QUANTITY</font></th>
	<th><font color='white'>UPDATE PRICE</font></th>
	<th><font color='white'>DELETE</font></th>
	</tr>";

	while($row = mysqli_fetch_array($result))
	{
		echo "<tr>";
		echo "<td><font color='white'>" . $row['PID']."</font></td>";
		echo "<td><font color='white'>" . $row['Name'] . "</font></td>";
		echo "<td><font color='white'>" . $row['ScName'] . "</font></td>";
		echo "<td><font color='white'>" . $row['Colour'] . "</font></td>";
		echo "<td><font color='white'>" . $row['Qty'] . "</font></td>";
		echo "<td><font color='white'>" . $row['Cost'] . "</font></td>";
		echo "<td><form action='edit.php' method='GET'><input type='hidden' name='edit' value='".$row["PID"]."'/><input type='submit' name='submit-btn' value='UPDATE QUANTITY' /></form></td>";
		echo "<td><form action='editp.php' method='GET'><input type='hidden' name='edit' value='".$row["PID"]."'/><input type='submit' name='submit-btn' value = 'UPDATE PRICE' /></form></td>";
		echo "<td><form action= 'delete.php'  method='GET'><input type='hidden' name='edit' value='".$row["PID"]."'/><input type='submit' name='submit-btn' value = 'DELETE' /></form></td>";

		echo "</tr>";
	}
		echo "</table>";
	}
	else{
	$message = "Incorrect Entry.\\nTry again.";
  		echo "<script type='text/javascript'>alert('$message');</script>";
	}
}
?>


<?php include('header.php');?>
	
<title>Update Plant</title>
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
          Update Plant Details
        </span>

        <div class="wrap-input100 validate-input" data-validate="ID is required">
          <span class="label-input100">Plant ID</span>
          <input class="input100" type="text" name="PID" placeholder="Enter plant ID">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate = "Name is required">
          <span class="label-input100">Name</span>
          <input class="input100" type="text" name="Name" placeholder="Enter your name">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate="Scientific Name is required">
          <span class="label-input100">Scientific Name</span>
          <input class="input100" type="text" name="ScName" placeholder="Enter scientific name">
          <span class="focus-input100"></span>
        </div>

        <div class="wrap-input100 validate-input" data-validate = "Colour is required">
          <span class="label-input100">Colour</span>
          <input class="input100" type="text" name="Colour" placeholder="Enter plant colour">
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

	<form method='GET' action='updatePlant.php'>
		<input type='submit' value = 'BACK'>
	</form>
<?php include('footer.php'); ?>
