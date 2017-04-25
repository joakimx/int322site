<?php
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
	  	border-radius: 15px 50px 30px;
		border-style:solid;
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
	  	background-color: #EFE9C8;
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
  	}

	table, td, th {
	  	border: 1px solid black;
  	}

	th {
	  	background-color: #74B95B;
  	}

	td {
	  	background-color: #F8AE60;
  	}
	table, tr {
	  	border-radius: 50px;
  	}

	footer {
	  	text-align: center;
	}


    a:hover {
	  	color: #EB5651;
	}

  </style>
</head>
<body>
<!-- Start of header -->
	<header>
		<h1>Kensingtons<br>Book Mart<span style="color:red">e</span></h1>
	</header>
<!-- Start of menu/link -->
		<ul id="link">
			<li><a href="add.php">Add</a></li>
			<li><a href="view.php" target="frame">Catalogue</a></li>
			<li><a href="cart.php" target="frame">View Cart</a></li>
		</ul>
<!-- Show all entries from the database when page is called from add.php -->
    <?php 
  view();
 ?>

<!-- Start of footer, end of add.php -->
	<footer>
  		<h4>Created by: Loven Costa</h4>
	</footer>
<!-- External sources/object used: http://4.bp.blogspot.com/_5nh7G5CNZF8/S_r-ZE5LQfI/AAAAAAAAAmU/CP0Du2NDTRw/s1600/P5010374.JPG -->
</body>
</html>
