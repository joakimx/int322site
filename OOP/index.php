<?php
include_once 'inc/classcrud.php';
$CRUD = new CRUD();
$valid = false;
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="style.css" type="text/css" />
  <title>Kensingtons Book Marte</title>
</head>
<body>
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
  $cost = '/^[ ]*[0-9]+\.[0-9]{2}[ ]*$/i';
  $price = '/^[ ]*[0-9]+\.[0-9]{2}[ ]*$/i';
  $onhand = '/^[ ]*[0-9]+[ ]*$/';
  $reorder = '/^[ ]*[0-9]+[ ]*$/';
  $backorder1 = '';

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
      $CRUD->__construct();
      $CRUD->create($_POST['item'], $_POST['desc'], $_POST['supplier'], $_POST['cost'], $_POST['price'], $_POST['onhand'], $_POST['reorder'], $_POST['backorder'], "n" );

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
</html>
