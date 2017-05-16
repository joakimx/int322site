<?php
include_once 'inc/classcrud.php';
$CRUD = new CRUD();
$db = $CRUD->__construct();
$username = $_POST['username']; //Set UserName
$password = $_POST['password']; //Set Password
$msg ='';
if(isset($username, $password)) {
    ob_start();
    // To protect MySQL injection (more detail about MySQL injection)
    $myusername = stripslashes($username);
    $mypassword = stripslashes($password);
    $myusername = $db->real_escape_string($myusername);
    $mypassword = $db->real_escape_string($mypassword);
    $con=mysqli_connect("localhost","notroot1","P@ssw0rd","int322_162b04");
    if ($con){
      echo "Connection Successful!";
    } else {
      echo "\nConnection not found!";
    }
    $sql = "SELECT * FROM login WHERE username='$myusername' AND password=SHA('$mypassword')";
    $result = mysqli_query($con, $sql);
    if($result){
      echo "\nResult exists!";
    } else {
      echo "\nResult not found!";
    }
    $row=mysqli_fetch_array($result,MYSQLI_NUM);
    if($row){
      echo "Row exists!";
      echo $row[1];
    } else {
      echo "Row not found!";
    }

    // Mysql_num_row is counting table row
    //$count = array();
    //$count = mysqli_fetch_array($result, MYSQLI_ASSOC);
    //$count=$db->mysqli_num_rows($result);
    // If result matched $myusername and $mypassword, table row must be 1 row
    if($row[1]){
        // Register $myusername, $mypassword and redirect to file "admin.php"
/*        session_register("admin");
        session_register("password");
        */
        $_SESSION['password'] = $password;
        $_SESSION['name']= $myusername;
	echo "Hello, " . $myusername;
        header("location:admin.php");
    }
    else {
        $msg = "Wrong Username or Password. Please retry";
        echo "Boop";
        header("location:login.php?msg=$msg");
    }
    ob_end_flush();
}
else {
    header("location:login.php?msg=Please enter some username and password");
}

?>
