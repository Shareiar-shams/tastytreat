<?php

$firstname="";
$lastname = "";
$email = "";
$phone = "";
$birthday = "";
$id = 0;
	$db = mysqli_connect('localhost','root', '', 'tastytreat');

	if(!$db)
		{
			die("Connection Failed...".mysqli_connect_error());
		}

		if (isset($_GET['del'])) {
			$id = $_GET['del'];
			mysqli_query($db, "DELETE FROM subscribe WHERE id=$id ");
			$_SESSION['msg'] = "Account DELETE!";
			header("location: subscribe_table.php");
		}
	$results = mysqli_query($db, "SELECT * FROM subscribe");					
					
 ?>