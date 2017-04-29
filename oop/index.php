<?php
include_once 'inc/classcrud.php';
$CRUD = new CRUD();
$valid = true;
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link rel="stylesheet" href="style.css" type="text/css" />
  <title>Kensingtons Book Marte</title>
</head>
<body>
  
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
</body>
</html>
