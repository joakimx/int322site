<?php
include_once 'dbconfig.php';
class CRUD{
  public function __construct()
  {
    $db = new DB_Con();
    $dbb = $db->__construct();
    return $dbb;
  }

//  public function create($item, $desc, $supplier, $cost, $price, $onhand, $reorder, $backorder, $deleted)
  public function create($sql)
  {

    if ($db = $this->__construct()) {
      echo "Successful\n";
    } else {
      echo "Not successful!\n";
    }

//    $db->query("INSERT INTO inventory (itemName, description, supplierCode, Cost, price, onHand, reorderPoint, backOrder, deleted)
//    VALUES ('$item', '$desc', '$supplier', '$cost', '$price', '$onhand', '$reorder', '$backorder', '$deleted');");
    $db->query($sql);
    $db->close();
  }

  public function view(){
        if ($db = $this->__construct()) {
      echo "Successful\n";
    } else {
      echo "Not successful!\n";
    }

    $qresult = $db->query("SELECT * FROM inventory;");

    echo "<table border='1' style='width:80%'>
            <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Price</th>
            <th>Cover</th>
            <th>Delete/Restore?</th>
	          <th>Cart it</th>
            </tr>";

    while($row = mysqli_fetch_array($qresult))
    {
            echo "<tr>";
            echo "<td>" . $row['title'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo '<td><a href="index.php?id=' . $row['id'] . '">Delete</a></td>';
            echo '<td><img src ="' . $row['image'] . '" height=\'250\' width=\'175\'></td>';
	    echo '<td><input name=\'checkbox[]\' type=\'checkbox\' value="' . $row['id'] . '"> </td>';
            echo "</tr>";
  }
  echo "</table>";
	print_r(array_values($chekbox));
}

  public function delete($id)
  {
        if ($db = $this->__construct()) {
      echo "Successful\n";
    } else {
      echo "Not successful!\n";
    }
    $id = $_GET['id'];
    $db->query("DELETE FROM inventory WHERE id =".$id);
    $db->close();
    header("Location: index.php");
  }

  public function update()
  {
        if ($db = $this->__construct()) {
      echo "Successful\n";
    } else {
      echo "Not successful!\n";
    }

    $db->query("UPDATE inventory SET itemName = '$item', description = '$desc', supplierCode = '$supplier', cost = '$cost', price = '$price'
     , onHand = '$onhand', reorderPoint = '$reorder', backOrder = '$backorder', deleted = 'n' WHERE id=".$id);
    $db->close();

  }

public function iquery($sql)
{

  if ($db = $this->__construct()) {
    echo "Successful\n";
  } else {
    echo "Not successful!\n";
  }

//    $db->query("INSERT INTO inventory (itemName, description, supplierCode, Cost, price, onHand, reorderPoint, backOrder, deleted)
//    VALUES ('$item', '$desc', '$supplier', '$cost', '$price', '$onhand', '$reorder', '$backorder', '$deleted');");
  $result = $db->query($sql);
  $db->close();
  return $result;
}

}

$CRUD = new CRUD();
?>
