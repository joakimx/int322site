<?php
ob_start();
if($_POST && $valid) {
	header_remove();
 	header("Location: view.php");
}
//library for common codes. 
require("a1.lib");
?>
<!DOCTYPE html>
<head>
  <title>Kensingtons Book Marte</title>

<!-- Start of CSS -->
<style>
	body {
	  	margin: auto;
	  	width: 80%;
	  	height: 100%;
		border: 1px solid #F4F4F4;
		paddig: 10px;
	  	background-color: #DDDDDD;
	}


	header {
		background-image: url('pic.jpg');
		background-repeat: no-repeat;
		width: 1000px;
	  	height: 400px;
		max-width:100%;
		max-height:100%;
		background-position: center center;
		background-size:cover;
		margin: auto;
		border-style:solid;
	  	border-radius: 15px 50px 30px;
	}

	h1 {
		font-size: 98px;
		font-weight: bold;
		text-align: center;
		text-shadow: 5px 5px 3px #030303, 6px 6px 1px #2F4F4F;
	  	color: #ff9c1d;
	  	font-style: oblique;
	}

	form {
		height: 400px;
	  	width: 1000px;
	  	border-width: 3px;
	  	border-style:solid;
	  	background-color:  #DAF7A6;
	  	margin: auto;
	  	border-radius: 15px 50px 30px;
	}


	h2 {
	   	background-color: #F0FFF0;
	  	width: 1000px;
	  	border-width:0px;
	  	border-style:solid;
	}

	div {
	  	width: 1000px;
	   	height: 500px;
	  	padding: 1px;
	  	border-width:2px;
	  	border-style:dashed;
	   	background-color: #F1EBCB;
	   	margin: auto;
	}

	ul#link li {
		display:inline;
		margin: auto;;
		text-align: center;
		font-weight: bold;
	}
	ul{
		margin: auto;
		text-align: center;
		font-size: 30px
	}


   	table {
	  	border-collapse: collapse;
	  	margin: auto;
	  	border-color: gray;
   	}

   	table, td, th {
	  	border: 1px solid black;
   	}

   	th {
	  	background-color: #FFD062;
	  	border-color: #ff0000 #0000ff;
   	}

   	td {
	  	background-color: #F9BE4C;
	  	border-color: #3c3c3d;
	  	border-width: 3px;
  	}

   	table, tr {
	  	border-radius: 50px;
  	}

   	footer {
	  	text-align: center;

  	}
</style>
</head>
<body>
	<header>
<!-- Start of header -->
		<h1>Kensingtons<br>Book Mart<span style="color:red">e</span></h1>

<!-- Start of menu/link -->
	</header>
		<ul id="link">
			<li><a href="add.php">Add</a></li>
			<li><a href="view.php" target="_self">Catalogue</a></li>
			<li><a href="cart.php" target="frame">View Cart</a></li>
		</ul>

<?php
  //Form variables//
  //If method is POST, generate error, assign POST values to variables//
  //Regex//
  $item1 = '/^[ ]*[A-Za-z0-9,\s\;\:\-\'\"]*[ ]*$/i';
  $desc1 = '/^[a-z0-9\.\,\'\.\s\\n\-]+$/i';
  $supplier1 = '/^[ ]*[A-Za-z0-9\.\' ]+[ ]*$/i';
  $cost1 = '/^[ ]*[0-9]+\.[0-9]{2}[ ]*$/i';
  $price1 = '/^[ ]*[0-9]+\.[0-9]{2}[ ]*$/i';
  $onhand1 = '/^[ ]*[0-9]+[ ]*$/';
  $reorder1 = '/^[ ]*[0-9]+[ ]*$/';
  $backorder1 = '';
  //Errno
  $valid= true;
  $errItem = "";
  $errDesc = "";
  $errSupplier = "";
  $errCost = "";
  $errPrice = "";
  $errOnhand = "";
  $errReorder = "";
  $errBackOrder = "";

 if ($_POST) {

	if ($_POST['item'] == "" || !(preg_match($item1, $_POST['item']))) {
      $errItem = " *Error -- Please input valid item name";
      $valid = false;
    }

    if ($_POST['desc'] == "" || !(preg_match($desc1, $_POST['desc']))) {
      $errDesc = " *Error -- Please input a short valid description";
      $valid = false;
    }
    if ($_POST['supplier'] == "" || (! preg_match($supplier1, $_POST['supplier']))) {
      $errSupplier = " *Error -- Please input valid item supplier";
      $valid = false;
    }

    if ($_POST['cost'] == "" || (! preg_match($cost1, $_POST['cost']))) {
      $errCost = " *Error -- Please input valid item cost";
      $dataValid = false;
    }

    if ($_POST['price'] == "" || !(preg_match($price1, $_POST['price']))) {
      $errPrice = " *Error -- Please input valid item price";
      $valid = false;
    }
    if ($_POST['onhand'] == "" || !(preg_match($onhand1, $_POST['onhand']))) {
      $errOnhand = " *Error -- Please input valid number on hand";
      $valid = false;
    }
    if ($_POST['reorder'] == "" || !(preg_match($reorder1, $_POST['reorder']))) {
      $errReorder = " *Error -- Please input valid number on reorder";
      $valid = false;
    }
    if ($_POST['backorder'] == "") {
      $backorder = 'n';
    } elseif ($_POST['backorder'] == "y") {
      $backorder = 'y';
    } else {
      $backorder = 'n';
    }
  }

//If fields are valid, store data in database
  if ($_POST && $valid) {
 

	$file = file('/var/www/html/int322site/topsecret.txt');
	$server = trim($file[0]);
	$user = trim($file[1]);
	$password = trim($file[2]);
	$db = trim($file[3]);
        $dbHandle = new mysqli($server, $user, $password, $db);


        //MySQL-digestable variables:
        $item = $_POST['item'];
        $item = $dbHandle->real_escape_string($item);

        $desc = $_POST['desc'];
        $desc = $dbHandle->real_escape_string($desc);

        $supplier = $_POST['supplier'];
        $supplier = $dbHandle->real_escape_string($supplier);

        $cost = $_POST['cost'];
        $email = $dbHandle->real_escape_string($cost);

        $price = $_POST['price'];
        $price = $dbHandle->real_escape_string($price);

        $onhand = $_POST['onhand'];
        $onhand= $dbHandle->real_escape_string($onhand);

        $reorder = $_POST['reorder'];
        $reorder= $dbHandle->real_escape_string($reorder);

        $backorder = $_POST['backorder'];
        $backorder= $dbHandle->real_escape_string($backorder);

        $sql = "INSERT INTO inventory (itemName, description, supplierCode, cost, price, onHand, reorderPoint, backOrder, deleted) VALUES ('$item', '$desc', '$supplier', '$cost', '$price', '$onhand', '$reorder', '$backorder', 'n');";

		//Enter all valid data into database
        if (mysqli_query($dbHandle, $sql)) {
          mysqli_close($dbHandle);
        } else {
          echo "Failed";
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
      <td><textarea name="desc" type="text" cols="25" rows="5" value="<?php if(isset($_POST['desc']) && !$valid) { echo $_POST['desc'];} elseif(isset($_POST['desc']) && $valid) {echo "";} ?>">
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
  </form>
<!--
<?php
//If all data is valid and was input into database, show updated records. 
if ($_POST && $valid) {
  echo "<br><br>";
  view();
//	header_remove();
 	header("Location: view.php");
}
 ?>
-->

<!-- Start of footer, end of add.php -->
	<footer>
		<h4>Created by: Loven Costa</h4>
	</footer>

<!-- External sources/object used: http://4.bp.blogspot.com/_5nh7G5CNZF8/S_r-ZE5LQfI/AAAAAAAAAmU/CP0Du2NDTRw/s1600/P5010374.JPG -->
</body>
</html>
