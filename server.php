<?php

$firstname="";
$lastname = "";
$email = "";
$password ="";
$id = 0;
	$db = mysqli_connect('localhost','root', '', 'tastytreat');

	if(!$db)
		{
			die("Connection Failed...".mysqli_connect_error());
		}

		if (isset($_GET['del'])) {
			$id = $_GET['del'];
			mysqli_query($db, "DELETE FROM user WHERE id=$id ");
			$_SESSION['msg'] = "Account DELETE!";
			header("location:user_table.php");
		}
	$results = mysqli_query($db, "SELECT * FROM user");					
					
 ?>