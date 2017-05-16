<?php
session_start(); //Start the session
//define(ADMIN,$_SESSION['name']); //Get the user name from the previously registered super global variable
	if($_SESSION['name'] == 'admin'){ //If session not registered
		header("location:login.php"); // Redirect to login.php page
	}
	else //Continue to current page
	header( 'Content-Type: text/html; charset=utf-8' );
	include_once 'inc/classcrud.php';
	$CRUD = new CRUD();
	$valid = false;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <link rel="stylesheet" href="style.css" type="text/css" />
  <title>Kensingtons Book Marte</title>
</head>
<body>
	<h1>Welcome To Admin Page <?php echo $_SESSION['name'] /*Echo the username */ ?></h1>
	<p><a href="logout.php">Logout</a></p> <!-- A link for the logout page -->
	<p>Put Admin Contents</p>
	<!-- Form error handling -->

	<?php
	//Initial error variables set to null string
	$errItem = "";
	$errDesc = "";
	$errSupplier = "";
	$errCost = "";
	$errPrice = "";
	$errOnhand = "";
	$errReorder = "";
	$errBackOrder= "";

	//Variables for regex checking
	$item = '/^[ ]*[A-Za-z0-9,\s\;\:\-\'\"]*[ ]*$/i';
	$desc = '/^[a-z0-9\.\,\'\.\s\\n\-]+$/i';
	$supplier = '/^[ ]*[A-Za-z0-9\.\' ]+[ ]*$/i';
	$cost = '/^[0-9]{1,3}(,[0-9]{3})*(\.[0-9]{2})?$/';
	$price = '/^[0-9]{1,3}(,[0-9]{3})*(\.[0-9]{2})?$/';
	$onhand = '/^[ ]*[0-9]+[ ]*$/';
	$reorder = '/^[ ]*[0-9]+[ ]*$/';
	$backorder1 = '';
//'$item', '$desc', '$supplier', '$cost', '$price', '$onhand', '$reorder', '$backorder', '$deleted'
	if ($_SERVER["REQUEST_METHOD"] == 'POST')
	{

		if (empty($_POST['item']) || !(preg_match($item, $_POST['item']))){
			$errItem = "Please enter item name" ;
			$valid = false;

		} else {
			$errItem = "";
			$valid = true;
		}

		if (empty($_POST['desc']) || !(preg_match($item, $_POST['desc']))){
			$errDesc = "Please enter item description" ;
			$valid = false;

		} else {
			$errDesc = "";
			$valid = true;
		}

		if (empty($_POST['supplier']) || !(preg_match($item, $_POST['supplier']))){
			$errSupplier = "Please enter item supplier" ;
			$valid = false;

		} else {
			$errSupplier = "";
			$valid = true;
		}

		if (empty($_POST['cost']) || !(preg_match($item, $_POST['cost']))){
			$errCost = "Please enter item cost" ;
			$valid = false;

		} else {
			$errCost = "";
			$valid = true;
		}

		if (empty($_POST['price']) || !(preg_match($item, $_POST['price']))){
			$errPrice = "Please enter item price" ;
			$valid = false;

		} else {
			$errPrice = "";
			$valid = true;
		}

		if (empty($_POST['onhand']) || !(preg_match($item, $_POST['onhand']))){
			$errOnhand = "Please enter items on hand" ;
			$valid = false;

		} else {
			$errOnhand = "";
			$valid = true;
		}

		if (empty($_POST['reorder']) || !(preg_match($item, $_POST['reorder']))){
			$errReorder = "Please enter item reorder point" ;
			$valid = false;

		} else {
			$errReorder = "";
			$valid = true;
		}

		if (empty($_POST['backorder']) || !(preg_match($item, $_POST['backorder']))){
			$errBackOrder = "Please enter item backorder" ;
			$valid = false;
			
		} else {
			$errBackOrder = "";
			$valid = true;
		}

		if($valid) {
			$db = $CRUD->__construct();
	$item = $item = $db->real_escape_string($_POST['item']);
	$desc = $desc = $db->real_escape_string($_POST['desc']);
	$supplier = $supplier = $db->real_escape_string($_POST['supplier']);
	$cost = $cost = $db->real_escape_string($_POST['cost']);
	$price = $price = $db->real_escape_string($_POST['price']);
	$onhand = $onhand = $db->real_escape_string($_POST['onhand']);
	$reorder = $reorder = $db->real_escape_string($_POST['reorder']);
	$backorder = $backorder = $db->real_escape_string($_POST['backorder']);
	$deleted = $deleted = $db->real_escape_string($_POST['deleted']);
	$sql = "INSERT INTO inventory (itemName, description, supplierCode, Cost, price, onHand, reorderPoint, backOrder, deleted) VALUES ('$item', '$desc', '$supplier', '$cost', '$price', '$onhand', '$reorder', '$backorder', '$deleted');";
	$CRUD->create($sql);

/*      $CRUD->create($_POST['item'], $_POST['desc'], $_POST['supplier'], $_POST['cost'], $_POST['price'], $_POST['onhand'], $_POST['reorder'], $_POST['backorder'], "n" );
	$sql = "INSERT INTO inventory (itemName, description, supplierCode, Cost, price, onHand, reorderPoint, backOrder, deleted) VALUES ('$_POST['item']', '$_POST['desc']', '$_POST['supplier']', '$_POST['cost']', '$_POST['price']', '$_POST['onhand']', '$_POST['reorder']', '$_POST['backorder']', 'n')";
*/
		}

	}
	?>

	<!-- Start of form..generate errors/populate fields if fields are not valid, else- display empty form -->
	<form action="" method="POST">
	<br>
		<table>
		<tr>
			<td>Item name:</td>
			<td><input name="item" type="text"  value="<?php if(isset($_POST['item']) && !$valid) { echo $_POST['item']; } elseif(isset($_POST['item']) && $valid) {echo "";} ?>" >
				<?php echo '<span style="color:red">' . $errItem . '</span>'; ?></td>
		</tr>
		<tr>
			<td>Description: </td>
			<td><textarea name="desc" type="text" cols="19" rows="0" value="<?php if(isset($_POST['desc']) && !$valid) { echo htmlspecialchars($_POST['desc']);} elseif(isset($_POST['desc']) && $valid) {echo "";} ?>">
		</textarea>
				<?php echo '<span style="color:red">' . $errDesc . '</span>'; ?> </td>
		</tr>
		<tr>
			<td>Supplier code:</td>
			<td><input name="supplier" type="text" value="<?php if(isset($_POST['supplier']) && !$valid) { echo $_POST['supplier']; } elseif(isset($_POST['supplier']) && $valid) {echo "";}?>">
				<?php echo '<span style="color:red">' . $errSupplier . '</span>'; ?> </td>
		</tr>
		<tr>
			<td>Cost: </td>
			<td><input name="cost" type="text" value="<?php if(isset($_POST['cost']) && !$valid) { echo $_POST['cost']; } elseif(isset($_POST['cost']) && $valid) {echo "";} ?>">
			<?php echo '<span style="color:red">' . $errCost . '</span>'; ?></td>
		</tr>
		<tr>
		<td>Selling price: </td>
			<td><input name="price" type="text" value="<?php if(isset($_POST['price']) && !$valid) { echo $_POST['price'];}  elseif(isset($_POST['price']) && $valid) {echo "";} ?>">
			<?php echo '<span style="color:red">' . $errPrice . '</span>'; ?></td>
		</tr>
			<tr>
			<td>Number on hand: </td>
			<td><input name="onhand" type="text" value="<?php if(isset($_POST['onhand']) && !$valid) { echo $_POST['onhand'];} elseif(isset($_POST['onhand']) && $valid) {echo "";} ?>">
			<?php echo '<span style="color:red">' . $errOnhand . '</span>'; ?></td>
		</tr>
		<td>Reorder Point: </td>
			<td><input name="reorder" type="text" value="<?php if(isset($_POST['reorder']) && !$valid) { echo $_POST['reorder'];} elseif(isset($_POST['reorder']) && $valid) {echo "";} ?>">
			<?php echo '<span style="color:red">' . $errReorder . '</span>'; ?></td>
		</tr>
		<td>Back Order Point: </td>
			<td><input name="backorder" type="text" value="<?php if(isset($_POST['backorder']) && !$valid ) { echo $_POST['backorder'];} elseif(isset($_POST['backorder']) && $valid) {echo "";} ?>">
			<?php echo '<span style="color:red">' . $errBackOrder . '</span>'; ?></td>
		</tr>
	<tr>
	<td>
	</td>
	<td>
		<input name="submit" type="submit">
	</td>
	</tr>
</table>
<?php
$CRUD->view();
if($_GET){
	$CRUD->delete($_GET['id']);
	$CRUD->view();
}
?>
	</form>
</body>
