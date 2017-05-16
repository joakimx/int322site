<?php
include_once 'inc/classcrud.php';

if ($_SERVER["REQUEST_METHOD"] == 'GET') {
$CRUD = new CRUD();
  $CRUD->view();

}

?>
