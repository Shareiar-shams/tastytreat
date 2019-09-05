<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["submit"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM cake WHERE id='" . $_GET["id"] . "'");
			$itemArray = array($productByCode[0]["id"]=>array('title'=>$productByCode[0]["title"], 'id'=>$productByCode[0]["id"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
			
			if(!empty($_SESSION["cart_item"])) 
			{
				if(in_array($productByCode[0]["id"],array_keys($_SESSION["cart_item"]))) 
				{
					foreach($_SESSION["cart_item"] as $k => $v) 
					{
							if($productByCode[0]["id"] == $k) 
							{
								if(empty($_SESSION["cart_item"][$k]["quantity"])) 
								{
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} 
				else 
				{
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} 
			else 
			{
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["id"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="images/YVSOn3yfOhLKts45byd9.png" type="image/png">
	    <title>Buy Item - Tasty Treat</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="vendor/style.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="webfonts/all.min.css">
    <link rel="stylesheet" type="text/css" href="webfonts/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="css/nice-select.css">
	<link rel="stylesheet" type="text/css" href="css/magnific-popup.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	<!-- main css -->
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5ZHM3ZV');</script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<style type="text/css">
	.bdy {
	font-family: Arial;
	color: #211a1a;
	font-size: 0.9em;
	margin-top: 20px; 
	}

	#shopping-cart {
		margin: 40px;
	}

	#product-grid {
		margin: 40px;
	}

	#shopping-cart table {
		width: 100%;
		background-color: #F0F0F0;
	}

	#shopping-cart table td {
		background-color: #FFFFFF;
	}

	.txt-heading {
		color: #211a1a;
		border-bottom: 1px solid #E0E0E0;
		overflow: auto;
	}

	#btnEmpty {
		background-color: #ffffff;
		border: #d00000 1px solid;
		padding: 5px 10px;
		color: #d00000;
		float: right;
		text-decoration: none;
		border-radius: 3px;
		margin: 10px 0px;
	}

	.btnAddAction {
	    padding: 5px 10px;
	    margin-left: 5px;
	    background-color: #38B250;
	    border: #E0E0E0 1px solid;
	    color: #211a1a;
	    float: right;
	    text-decoration: none;
	    border-radius: 3px;
	    cursor: pointer;
	}
	.btnd
	{
		margin-left: 90%;
		margin-top: 20px;
	}

	#product-grid .txt-heading {
		margin-bottom: 18px;
	}

	.product-item {
		float: left;
		background: #ffffff;
		margin: 30px 30px 0px 0px;
		border: #E0E0E0 1px solid;
	}

	.product-image {
		height: 155px;
		width: 250px;
		background-color: #FFF;
	}

	.product-image .imge
	{
		width: 250px;
		height: 155px;
		background-color: #FFF;
		text-align: center;
	}

	.clear-float {
		clear: both;
	}

	.demo-input-box {
		border-radius: 2px;
		border: #CCC 1px solid;
		padding: 2px 1px;
	}

	.tbl-cart {
		font-size: 0.9em;
	}

	.tbl-cart th {
		font-weight: normal;
		height: 20px;
		font-size: 15px;
	}

	.grp
	{
		text-align: center;
		font-size: 15px;
	}
	.grp img
	{
		margin-top: 10px;
	}

	.product-title {
		margin-bottom: 20px;
		font-size: 15px;
	}

	.product-price {
		float:left;
		font-size: 13px;
		color: #2E5F38;
	}

	.cart-action {
		float: right;
	}

	.product-quantity {
	    padding: 5px 10px;
	    border-radius: 3px;
	    border: #E0E0E0 1px solid;
	}

	.product-tile-footer {
	    padding: 15px 15px 0px 15px;
	    overflow: auto;
	}

	.cart-item-image {
		width: 30px;
	    height: 30px;
	    border-radius: 50%;
	    border: #E0E0E0 1px solid;
	    padding: 5px;
	    vertical-align: middle;
	    margin-right: 15px;
	}
	.no-records {
		text-align: center;
		clear: both;
		margin: 38px 0px;
	}
</style>
</head>

<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5ZHM3ZV"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

	<!--================ Start Loader Area =================-->
	<div class="loading">
		<div class="gooey">
			<span class="dot"></span>
			<div class="dots">
				<span></span>
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!--================ End Loader Area =================-->



	

<section class="bdy container">
<div id="shopping-cart" class="container">
<div class="txt-heading "><h2>Shopping Cart</h2></div>

<a id="btnEmpty" href="cartp.php?action=empty">Empty Cart</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
	<th style="text-align:center;">Id</th>
	<th style="text-align:center;" width="20%">Image</th>
	<th style="text-align:center;">Name</th>
	<th style="text-align:center;" width="5%">Quantity</th>
	<th style="text-align:center;" width="10%">Unit Price</th>
	<th style="text-align:center;" width="10%">Price</th>
	<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td class="grp" style="width: 10%;"><?php echo $item["id"]; ?></td>
				<td class="grp" style="width: 15%;"><img style="width: 100px; height: 100px;" src="<?php echo $item["image"]; ?>" class="cart-item-image" /></td>
				<td class="grp"><?php echo $item["title"]; ?></td>
				<td class="grp" style="text-align:center;"><?php echo $item["quantity"]; ?></td>
				<td class="grp"  style="text-align:center;"><?php echo "৳ ".$item["price"]; ?></td>
				<td class="grp"  style="text-align:center;"><?php echo "৳ ". number_format($item_price,2); ?></td>
				<td class="grp" style="text-align:center;"><a href="cartp.php?action=remove&id=<?php echo $item["id"]; ?>" class="btnRemoveAction"><img src="images/icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td style="font-size: 14px;" align="right" colspan="3">Total:</td>
<td style="font-size: 14px;" align="right"><?php echo $total_quantity; ?></td>
<td style="font-size: 14px;" align="right" colspan="2"><strong><?php echo "৳ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>

	<a style="text-decoration: none;" href="buycart.php?action=<?php echo $item["id"];?>" class="btnd btn btn-primary">Continue To Buy</a>

  <?php
} 
else
{
?>
<div class="no-records"><h5>Your Cart is Empty</h5></div>
<?php 
}
?>
</div>

<div id="product-grid" class="container">
	<div class="txt-heading"><h2>Products</h2></div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM cake ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="cartp.php?action=add&id=<?php echo $product_array[$key]["id"]; ?>">
			<div class="product-image"><img class="imge" src="<?php echo $product_array[$key]['image']; ?>"></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["title"]; ?></div>
			<hr style="border : 0.5px dotted #000;">
			<div class="product-price"><?php echo "৳".$product_array[$key]["price"]; ?></div>
			<div class="cart-action">
				<input type="text" class="product-quantity" name="quantity" value="1" size="2" placeholder="how many you want?" />
				<input type="submit" name="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
		</div>
	<?php
		}
	}
	?>
</div>
</section>


<!--================ Start Footer Area  =================-->
<footer class="footer-area section_gap">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h4 class="text-white">About Us</h4>
                    <p>
                        With the motto of “Food You’ll Love To Share”, Tasty Treat not only thrives to bring amazing food, but also promotes in sharing and spreading happiness with others.
                    </p>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h4 class="text-white">QuickLinks</h4>
                    
                    <ul class="footer-menu">



    
    <li class="">
        <a href="about.php" target="_self" style="">
            
            <span>About</span>
        </a>
            </li>

    
    <li class="">
        <a href="Media.php" target="_self" style="">
            
            <span>News &amp; Media</span>
        </a>
            </li>

    
    <li class="">
        <a href="contract.php" target="_self" style="">
            
            <span>Contact</span>
        </a>
            </li>

</ul>

                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h4 class="text-white">Others</h4>
                    
                    <ul class="footer-menu">



    
    <li class="">
        <a href="https://www.tastytreatbd.com/get-app" target="_self" style="">
            
            <span>Download App</span>
        </a>
    </li>
    <li class="">
        <a href="logoutuser.php" target="_self" style="">
            
            <span>Log Out</span>
        </a>
    </li>

    <li class="">
        <a href="resetuser.php" target="_self" style="">
            
            <span>Reset Your Password</span>
        </a>
    </li>

</ul>

                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="single-footer-widget">
                    <h4 class="text-white">Gallery</h4>
                    
                    <ul class="footer-menu">



    
    <li class="">
        <a href="photo.php" target="_self" style="">
            
            <span>Photo Gallery</span>
        </a>
            </li>

    
    <li class="">
        <a href="#" target="_self" style="">
            
            <span>Video Gallery</span>
        </a>
            </li>

</ul>

                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="footer-bottom text-center d-flex justify-content-between">
                    <p class="footer-text">Copyright © 2019.
                        <a href="index.php">Tasty<span style="color:#fff">Treat</span></a>
                    </p>

                    <div class="footer-social d-flex align-items-center justify-content-center">
                        <a target="_blank" href="https://www.facebook.com/tastytreatbd/"><i class="fab fa-facebook-f"></i></a>

    <a target="_blank" href="https://www.instagram.com/tastytreatbd/"><i class="fab fa-instagram"></i></a>

    <a target="_blank" href="https://www.youtube.com/channel/UC-n4N7Ssg4FgjuMrrMv17kw"><i class="fab fa-youtube"></i></a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--================ End Footer Area  =================-->
    <!-- ####################### Start Scroll to Top Area ####################### -->
    <div id="back-top">
        <a title="Go to Top" href="#">
            <i class="fa fa-angle-up"></i>
        </a>
    </div>
    <!-- ####################### End Scroll to Top Area ####################### -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/modernizr.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/stellar.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    
    <script src="js/owl.carousel.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7nx22ZmINYk9TGiXDEXGVxghC43Ox6qA"></script>
    <script src="js/theme.js"></script>
    
    </body>

</html>
