<?php
include('header.php');
session_start();
require_once("db.php");
require_once("dbc.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM plant WHERE PID='" . $_GET["PID"] . "'");
			$itemArray = array($productByCode[0]["PID"]=>array('Name'=>$productByCode[0]["Name"], 'PID'=>$productByCode[0]["PID"], 'ScName'=>$productByCode[0]["ScName"],'Colour'=>$productByCode[0]["Colour"],'quantity'=>$_POST["quantity"], 'Cost'=>$productByCode[0]["Cost"] ,'Image'=>$productByCode[0]["Image"],'Qty'=>$productByCode[0]["Qty"]));
			
			if ($productByCode[0]["Qty"]<$_POST["quantity"])
			{
				$message = "Invalid quantity of plants entered.\\nTry again.";
  				echo "<script type='text/javascript'>alert('$message');</script>";
				break;
			}
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["PID"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["PID"] == $_SESSION["cart_item"][$k]['PID']) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["PID"] == $_SESSION["cart_item"][$k]['PID'])
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<HTML>
<HEAD>
<TITLE>Shopping Cart</TITLE>
<link href="styleshop.css" type="text/css" rel="stylesheet" />
<style>body{background-color:#ffdcf4}</style>
</HEAD>
<BODY>
<div id="shopping-cart">
<center><div class="txt-heading"><h2><font color="black">SHOPPING CART</font></h2></div></center>

<a id="btnEmpty" href="index2.php?action=empty">EMPTY CART</a>
<div class="jumbotron">

<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;"><strong>NAME</strong></th>
<th style="text-align:left;"><strong>PLANT ID</strong></th>
<th style="text-align:right;" width="5%"><strong>SCIENTIFIC NAME</strong></th>
<th style="text-align:right;" width="10%"><strong>COLOUR</strong></th>
<th style="text-align:right;" width="10%"><strong>QUANTITY</strong></th>
<th style="text-align:right;" width="5%"><strong>PRICE</strong></th>
<th style="text-align:right;" width="5%"><strong>AMOUNT</strong></th>
<th style="text-align:right;" width="5%"><strong>REMOVE</strong></th>
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["Cost"];
		?>
				<tr>
				<td><img src="<?php echo $item["Image"]; ?>" class="cart-item-image" /><?php echo $item["Name"]; ?></td>
				<td><?php echo $item["PID"]; ?></td>
				<td style="text-align:right;"><?php echo $item["ScName"]; ?></td>
				<td style="text-align:right;"><?php echo $item["Colour"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "Rs ".$item["Cost"]; ?></td>
				<td  style="text-align:right;"><?php echo "Rs ". $item_price; ?></td>
				<td style="text-align:center;"><a href="index2.php?action=remove&PID=<?php echo $item["PID"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="REMOVE ITEM" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["Cost"]*$item["quantity"]);
				$_SESSION["total_price"]=$total_price;
		}
		?>

<tr>
<td colspan="4" align="right">TOTAL:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "Rs ".$total_price; ?></strong></td>

<form action = "" method = "post">
<td colspan="3" align=right><strong><input type="submit" name = "ok" value="SUBMIT"></td>
<td></td>
</tr>
<?php 	 
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["ok"]))
{
		
		$newID =  $_SESSION["new"];
				$iid = $_SESSION["name"];
				$total=$_SESSION["total_price"];
		    foreach ($_SESSION["cart_item"] as $item){
			$mplantid = $item["PID"];
			$quantity = $item["quantity"];
			$mtotal = $item["Cost"] * $quantity;	
			$db_handle->runWrite("INSERT INTO transaction VALUES('$newID','$iid','$mplantid',NOW(), $quantity,$mtotal)");
			#echo "SUCCESS";
		}?>
		<tr>
		<?php
		echo "<form></form><br />";
		echo "<form method='GET' action='finialize.php'>
    		<input type='hidden' name='custid' value='$iid'>
		<input type='hidden' name='newid' value='$newID'>"?>
		<td colspan="5" align=right>
   		<?php echo "<input type='submit' value = 'FINALISE ORDER'>"?></td>
		<?php echo "</form>"; ?>

		<?php
		echo "<form method='GET' action='bill.php'>
    		<input type='hidden' name='custid' value='$iid'>
		<input type='hidden' name='newid' value='$newID'>"?>
		<td colspan="3" align=right>
   		<?php echo "<input type='submit' value = 'CONTINUE ORDER'>"?></td>
		<?php echo "</form>";  ?>
		</tr>
<?php } ?>

</form>
</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records"><font color="black">YOUR CART IS EMPTY</font></div>
<?php 
}
?>


</div>

</div>
<center>

	<div id="product-grid">
	<center><div class="txt-heading"><h3><font color="black" >PLANTS AVAILABLE</h3></font></div></center>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM plant ORDER BY PID ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="index2.php?action=add&PID=<?php echo $product_array[$key]["PID"]; ?>">
			<div class="product-image"><img src="<?php echo $product_array[$key]["Image"]; ?>"></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["Name"]; ?></div>
			<div class="product-pid"><?php echo "Quantity Left :".$product_array[$key]["Qty"]; ?></div>
			<div class="product-price"><?php echo "Rs ".$product_array[$key]["Cost"]; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="ADD TO CART" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>

</center>

</BODY>
</HTML>
