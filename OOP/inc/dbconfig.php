<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'notroot1');
define('DB_PASSWORD', 'P@ssw0rd');
define('DB_NAME', 'int420_151b14');

class DB_Con
{
	function __construct()
		{
			$conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or die('Error connecting to server'. mysqli_connect_error());
			return $conn;
		}
	}

	?>
