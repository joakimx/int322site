<?php
include_once 'dbconfig.php';
class CRUD{
  public function __construct()
  {
    $db = new DB_Con();
    $dbb = $db->__construct();
    return $dbb;
  }

  public function create($item, $desc, $supplier, $cost, $price, $onhand, $reorder, $backorder, $deleted)
  {

    if ($db = $this->__construct()) {
      echo "Successful\n";
    } else {
      echo "Not successful!\n";
    }

    $db->query("INSERT INTO inventory (itemName, description, supplierCode, Cost, price, onHand, reorderPoint, backOrder, deleted)
    VALUES ('$item', '$desc', '$supplier', '$cost', '$price', '$onhand', '$reorder', '$backorder', '$deleted');");
    $db->close();
  }

  public function view(){
        if ($db = $this->__construct()) {
      echo "Successful\n";
    } else {
      echo "Not successful!\n";
    }

    $qresult = $db->query("SELECT * FROM inventory;");

    echo "<table border='1'>
            <tr>
            <th>ID</th>
            <th>Item Name</th>
            <th>Description</th>
            <th>Supplier</th>
            <th>Cost</th>
            <th>Price $</th>
            <th>On Hand</th>
            <th>Reorder Level</th>
            <th>On Backorder?</th>
            <th>Delete/Restore Flag</th>
            <th>Delete/Restore?</th>
            </tr>";

    while($row = mysqli_fetch_array($qresult))
    {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['itemName'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td>" . $row['supplierCode'] . "</td>";
            echo "<td>" . $row['cost'] . "</td>";
            echo "<td>" . $row['price'] . "</td>";
            echo "<td>" . $row['onHand'] . "</td>";
            echo "<td>" . $row['reorderPoint'] . "</td>";
        	  echo "<td>" . $row['backOrder'] . "</td>";
        	  echo "<td>" . $row['deleted'] . "</td>";
            echo '<td><a href="index.php?id=' . $row['id'] . '">Delete</a></td>';
            echo "</tr>";
    }
    echo "</table>";
    $db->close();
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

}

$CRUD = new CRUD();
$CRUD->__construct();
$CRUD->create();
?>
