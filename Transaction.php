<?php include('header.php'); ?>
<TITLE>Transaction</TITLE>
<br>
        <center><h2><font color="black">FILTER BY:</font></h2></center>
        
<br>
	<div class = "container">
	<div class="row align-items-center">
	    <div class="col">
		<form class="form-inline" method='POST'>
		<button type="button" class="btn btn-outline-secondary" onclick="window.location.href='http://localhost/filterc.php'">
CUSTOMER ID</button>
		</form>
	    </div>
	    <div class="col">
		<form class="form-inline" method='POST'>
		<button type="button" class="btn btn-outline-secondary" onclick="window.location.href='http://localhost/filterd.php'">
DATE</button>
		</form>
	    </div>
	    <div class="w-100"></div>
	    <div class="col">
		<form class="form-inline" method='POST'>
		<button type="button" class="btn btn-outline-secondary" onclick="window.location.href='http://localhost/filteri.php'">
PLANT ID</button>
		</form>
	    </div> 
	    <div class="col">
		<form class="form-inline" method='POST'>
		<button type="button" class="btn btn-outline-secondary" onclick="window.location.href='http://localhost/viewall.php'">
VIEW ALL</button>
		</form>
	    </div> 
	 </div>           
    <hr>                      
    </form> 
	<form method='GET' action='admin.html'>
		<button type = 'submit' class = "btn btn-danger my-2 my-sm-0">BACK</button>
	</form>
 </div>
<?php include('footer.php'); ?>

