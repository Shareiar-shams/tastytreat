<?php
	
	$db = mysqli_connect('localhost','root', '', 'tastytreat');

	if(!$db)
		{
			die("Connection Failed...".mysqli_connect_error());
		}	

		if (isset($_GET['edit'])) {

			$id = $_GET['edit'];

        $query = "SELECT * FROM payment  WHERE id=$id";
        $read = mysqli_query($db,$query);
        if (mysqli_num_rows($read)>0) 
        {
          while ($row=mysqli_fetch_array($read)) 
          {
            $pname = $row['pname'];
		    $pprice = $row['pprice'];       
		    $quentity = $row['quentity'];  
		    $uname = $row['name'];
		    $uemail = $row['email'];
		    $address = $row['address'];
		    $city = $row['city'];
		    $phone = $row['phone'];
		    $edate = $row['edate'];
		    $etime = $row['etime'];
          }
   		}
			$delete_sql = mysqli_query($db, "DELETE FROM payment WHERE id=$id ");
			

			if($delete_sql)
			{
				mysqli_query($db, "INSERT INTO `ordered`( `pname`, `pprice`, `quentity`, `uname`, `uemail`, `address`, `city`, `phone`, `edate`, `etime`) VALUES ('$pname','$pprice','$quentity','$uname','$uemail','$address','$city','$phone','$edate','$etime')");
				$_SESSION['msg'] = "Account DELETE!";
				header("location:ordershow.php");
			}
			
		}
		
		
		
	$results = mysqli_query($db, "SELECT * FROM payment");					
					
 ?>