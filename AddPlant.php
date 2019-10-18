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
	<TITLE>Add Plant</TITLE>
             <center><font color="white"><h2 Class= "Header2"> ENTER DETAILS</h2></font></center>
	<p>
       <form action = "" method = "post">
                  <center><label><font color="white">PLANT ID :</font></label><input type = "text" name = "plantid" align = "middle" class = "box"/></center><br /><br />
                  <center><label><font color="white">NAME  :</font></label><input type = "text" name = "name" align = "middle" class = "box"/></center><br /><br />
                  <center><label><font color="white">SCIENTIFIC NAME  :</font></label><input type = "text" name = "scientificname" align = "middle" class = "box"/></center><br /><br />
                  <center><label><font color="white">COLOUR  :</font></label><input type = "text" name = "colour" align = "middle" class = "box"/></center><br /><br />
		  <center><label><font color="white">DATE OF SOWING  :</font></label><input type = "text" name = "date" align = "middle" class = "box"/></center><br /><br />
		  <center><label><font color="white">PRICE :</font></label><input type = "text" name = "price" align = "middle" class = "box" /></center><br/><br />
		  <center><label><font color="white">STAGE OF GROWTH :</font></label><input type = "text" name = "stage" align = "middler" class = "box"/></center><br /><br />
                  <center><label><font color="white">QUANTITY  :</font></label><input type = "text" name = "cquantity" align = "middle" class = "box"/></center><br /><br />
		  <center><label><font color="white">IMAGE PATH  :</font></label><input type = "text" name = "image" align = "middle" class = "box"/></center><br /><br />
                  <center><input type = "submit"  align = "middle" value = " SUBMIT "/></center><br />
               </form>
	<form method='GET' action='updatePlant.php'>
	<input type='submit' value = 'BACK'>
 	</form>
	</p>
<?php include('footer.php'); ?>
