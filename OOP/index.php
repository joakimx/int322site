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
  $errTitle = "";
  $errDescription = "";
  $errPrice = "";
  $errImage= "";

  //Variables for regex checking
  $title = '/^[ ]*[A-Za-z0-9,\s\;\:\-\'\"]*[ ]*$/i';
  $description = '/^[a-z0-9\.\,\'\.\s\\n\-]+$/i';
  $price = '/^[0-9]{1,3}(,[0-9]{3})*(\.[0-9]{2})?$/';
  //$image = '/(?i)\b((?:[a-z][\w-]+:(?:/{1,3}|[a-z0-9%])|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'".,<>?«»“”‘’]))/';
  $image = "";

  if ($_SERVER["REQUEST_METHOD"] == 'POST')
  {

    if (empty($_POST['title']) || !(preg_match($title, $_POST['title']))){
      $errTitle = "Please enter item title" ;
      $valid = false;
    } else {
      $errTItle = "";
      $valid = true;
    }

    if (empty($_POST['description']) || !(preg_match($description, $_POST['description']))){
      $errDescription = "Please enter item description" ;
      $valid = false;
    } else {
      $errDescription = "";
      $valid = true;
    }


    if (empty($_POST['price']) || !(preg_match($price, $_POST['price']))){
      $errPrice = "Please enter item price" ;
      $valid = false;
    } else {
      $errPrice = "";
      $valid = true;
    }

    if (empty($_POST['image']) || !(preg_match($image, $_POST['image']))){
      $errImage = "Please enter image link" ;
      $valid = true;
    } else {
      $errImage = "";
      $valid = true;
    }

    if($valid) {
      $db = $CRUD->__construct();
	$title = $title = $db->real_escape_string($_POST['title']);
	$description = $description = $db->real_escape_string($_POST['description']);
	$price = $price = $db->real_escape_string($_POST['price']);
	$image = $image = $db->real_escape_string($_POST['image']);
	$sql = "INSERT INTO inventory (title, description, price, image) VALUES ('$title', '$description', '$price', '$image');";
	$CRUD->create($sql);

/*      $CRUD->create($_POST['title'], $_POST['description'], $_POST['price'], $_POST['image']);
	$sql = "INSERT INTO inventory (title, description, price, image) VALUES ('$_POST['title']', '$_POST['description']', '$_POST['price']', '$_POST['image']')";
*/
    }

  }
  ?>

  <form action="" method="POST">
	<br>
    <table>
    <tr>
      <td>Item Title:</td>
      <td><input name="title" type="text"  value="<?php if(isset($_POST['title']) && !$valid) { echo $_POST['title']; } elseif(isset($_POST['title']) && $valid) {echo "";} ?>" >
        <?php echo '<span style="color:red">' . $errTitle . '</span>'; ?></td>
    </tr>
    <tr>
      <td>Item Description: </td>
      <td><textarea name="description" type="text" cols="19" rows="0" value="<?php if(isset($_POST['description']) && !$valid) { echo htmlspecialchars($_POST['description']);} elseif(isset($_POST['description']) && $valid) {echo "";} ?>">
	  </textarea>
        <?php echo '<span style="color:red">' . $errDescription . '</span>'; ?> </td>
    </tr>
    <tr>
      <td>Item Price:</td>
      <td><input name="price" type="text" value="<?php if(isset($_POST['price']) && !$valid) { echo $_POST['price']; } elseif(isset($_POST['price']) && $valid) {echo "";}?>">
        <?php echo '<span style="color:red">' . $errPrice . '</span>'; ?> </td>
    </tr>
    <tr>
    <td>Front Cover:</td>
      <td><input name="image" type="text" value="<?php if(isset($_POST['image']) && !$valid) { echo $_POST['image'];}  elseif(isset($_POST['image']) && $valid) {echo "";} ?>">
      <?php echo '<span style="color:red">' . $errImage . '</span>'; ?></td>
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
