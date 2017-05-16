<?php



//common function 
//<!-- External sources/object used: http://4.bp.blogspot.com/_5nh7G5CNZF8/S_r-ZE5LQfI/AAAAAAAAAmU/CP0Du2NDTRw/s1600/P5010374.JPG -->
function view(){
	//DB Credentials

	$file = file('/var/www/html/int322site/topsecret.txt');
	$server = trim($file[0]);
	$user = trim($file[1]);
	$password = trim($file[2]);
	$db = trim($file[3]);
	$dbHandle = new mysqli($server, $user, $password, $db);
    //Display result from the database using html table
	$query = "SELECT * FROM inventory;";
	$qresult = mysqli_query($dbHandle, $query) or die("Failed");
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

    while($row = mysqli_fetch_array($qresult)){
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
      echo '<td><a href="delete.php?id=' . $row['id'] . '">Cancel</a></td>';
      echo "</tr>";
    }

   echo "</table>";
   mysqli_close($dbHandle);
	}

?>
