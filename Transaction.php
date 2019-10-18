<?php include('header.php'); ?>
<TITLE>Transaction</TITLE>
        <center><h2><font color="white">FILTER BY</font></h2></center>
        <center><h3><font color="white">CHOOSE</font></h3></center>
        <p>
        <form>
                <center><input type="button" value="CUSTOMER ID" onclick="window.location.href='http://localhost/filterc.php'" /></center><br /><br />           
                <center><input type="button" value="DATE" onclick="window.location.href='http://localhost/filterd.php'" /></center><br /><br />       
                <center><input type="button" value="PLANT ID" onclick="window.location.href='http://localhost/filteri.php'" /></center><br /><br />       
                <center><input type="button" value="VIEW ALL" onclick="window.location.href='http://localhost/viewall.php'" /></center><br /><br />                    
        </form> 
	<form method='GET' action='admin.php'>
<input type='submit' value = 'BACK'>
</form>
        </p>


<?php include('footer.php'); ?>

