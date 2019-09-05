<?php  
include "database.php";
?>

<?php 
 $id = 1;
 $db = new database();
 $query = "SELECT * FROM cake WHERE id=$id";
 $getData = $db->select($query)->fetch_assoc();
 
if(isset($_POST['insert'])){

	$file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
 $title = mysqli_real_escape_string($db->link, $_POST['title']);
 $size = mysqli_real_escape_string($db->link, $_POST['size']);
 $size1  = mysqli_real_escape_string($db->link, $_POST['size1']);
 $price = mysqli_real_escape_string($db->link, $_POST['price']);
 $price1 = mysqli_real_escape_string($db->link, $_POST['price1']);

 if($file == '' || $size == '' || $size1 == ''  || $title == '' ||  $price == '' || $price1 == '')
 {
  $error = "Field must not be Empty !!";
 } 
 else 
 {
  $query = "UPDATE cake
  SET
  image  = '$file',
  size = '$size',
  size1  = '$size1',
  title = '$title',
  price = '$price',
  price1 = '$price1'
  WHERE id = $id";
  $update = $db->update($query);
 }
}
?>

    <?php
  if(isset($_GET['msg'])){
      echo "<span style='color: green'>".$_GET['msg']."</span>";
  }  
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="images/YVSOn3yfOhLKts45byd9.png" type="image/png">
		<title>Admin - Tasty Treat</title>
    <meta name="description" content="Strawberry Cake meta description">
		<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="vendor/style.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="webfonts/all.min.css">
    <link rel="stylesheet" type="text/css" href="webfonts/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="css/nice-select.css">
	<link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<style type="text/css">
		body
		{
			margin: 0;
			padding: 0;
			background: url(images/black_forest.jpg);
		}
		.formitem
		{
			width: 100%;
			height: 100%;
		}
		form
		{
			margin: 30px auto;
			width: 35%;
			height: 400px;
			background: #38544E;
			border-radius: 5px;
		}
		.formitem table
		{
			margin: 30px auto;
			width: 35%;
			background: #38544E;
			border-radius: 10px;
			color: #33C2A4;
		}
		.formitem table th
		{
			text-align: center;
			font-size: 20px;
		}
		label
		{
			color:#978A2A;
			font-size: 22px; 
			text-transform: uppercase;
			text-align: center;
			text-align: center;
		}
		 input[type=text], input[type=file]
        {
            width: 100%;
            box-sizing: border-box;
            padding: 12px 5px;
            background: rgba(0,0,0,0.10);
            outline: none;
            border: none;
            border-bottom: 1px dotted #95A4A9;
            color: #95A4A9;
            border-radius: 5px;
            margin: 5px;
            font-weight: bold;
            text-align: center;
        }

         input[type=submit]
        {
            width: 100%;
            box-sizing: border-box;
            padding: 10px 0px;
            margin-top: 30px;
            outline: none;
            border: none;
            opacity: 0.7;
            background: #07A4ED;
            border-radius: 30px;
            font-size: 20px;
            color: #E4E9DE;
            font-weight: bold;
            letter-spacing:2px;
        }

        input[type=submit]:hover
        {
            background: #003366;
            opacity: 0.7;
            color: #74764F;
        }

        .warper
        {
        	display: flex;
        }
        .warper1
        {
        	display: flex;
        }

	</style>
</head>
<body>

	<div class="formitem container">
			<table class="table table-bordered">
				<tr>
					<th>Images</th>
				</tr>
				<?php 
				if (isset($_POST["image"])) 
				{
				
					$query = "SELECT * FROM cake ORDER BY id DESC";
					$result = mysqli_query($db, $query);
					while ($row = mysqli_fetch_array($result)) 
					{
						echo '
						 	<tr>
						 		<td>
						 			<img src="data:image/jpeg;base64, '.base64_encode($row['image']).' "/>
						 		</td>
						 	</tr>
						';
					}
				}
				 ?>
				
			</table>
		<form action="firstpic.php?id=<?php echo $id;?>" method="post" enctype="multipart/form-data">
			<label>Select Image</label>
			<input type="file" name="image" id="image" value="">
			<input type="text" name="title" value="<?php echo $getData['title']; ?>">
			<div class="warper">
			<div class="col-lg-6">
			<input type="text" name="size" value="<?php echo $getData['size']; ?>">
			</div>
			<div class="col-lg-6">
			<input type="text" name="size1" value="<?php echo $getData['size1']; ?>">
			</div>
			</div>
			<div class="warper1">
			<div class="col-lg-6">		
			<input type="text" name="price" value="<?php echo $getData['price']; ?>">
			</div>
			<div class="col-lg-6">
			<input type="text" name="price1" value="<?php echo $getData['price1']; ?>">
			</div>	
			</div>
			<input type="submit" name="insert" id="insert" value="Update" class="">
		</form>
	</div>

</body>
</html>

<script>
	$(document).ready(function()
	{
		$('#insert').click(function()
		{
			var image_name = $('#image').val();
			if (image_name == '') 
			{
				alert("Please Select Images");
				return false;
			}

			else
			{
				var extension = $('#image').val().split('.').pop().toLowerCase();
				if (jQuery.inArray(extension, ['gif','png','jpeg','jpg']) == -1) 
				{
					alert("Invalid Image File");
					$('#image').val('');
					return false;
				}
			}
		});
	});
</script>