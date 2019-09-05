<?php

require_once "config.php";
 
 if(isset($_POST['submit'])){
 $fname = $_POST['fname'];
 $lname = $_POST['lname'];
 $email = $_POST['email'];
 $phone = $_POST['phone'];
 $birthday = $_POST['birthday'];
 }
 $email = $phone = "";
 $email_err = $phone_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST")
{
 
    
    
    if(empty(trim($_POST["email"])))
    {
        $email = "Please enter a Email..";
    } 
    
    else
    {  
        $sql = "SELECT id FROM subscribe WHERE email= ?";
        
        if($stmt = mysqli_prepare($link, $sql))
        {
        
            mysqli_stmt_bind_param($stmt, "s", $param_email);
         
            $param_email = trim($_POST["email"]);
        
            if(mysqli_stmt_execute($stmt))
            {
            
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $email_err = "This Email is already taken.";
                } 
                else
                {
                    $email = trim($_POST["email"]);
                }
            }
                else
                {
                echo "Oops! Something went wrong. Please try again later.";
                }
        }
         
   
        mysqli_stmt_close($stmt);
    } 


    if (empty(trim($_POST["phone"]))) {
        $phone_err = "Please enter phone Number";
    }
    elseif(strlen(trim($_POST["phone"])) !=11)
    {
        $phone_err = "Phone must have 11 Number.";
    }
    else
    {
        $phone = trim($_POST["phone"]);
    }


    if (empty($email_err) && empty($phone_err)) 
    {
        
        $sql = "INSERT INTO subscribe (fname, lname, email, phone, birthday) VALUES ('$fname' , '$lname' , ? , ? , '$birthday')";
         
        if($stmt = mysqli_prepare($link, $sql)){
            
            mysqli_stmt_bind_param($stmt, "ss", $param_email, $param_phone);
            
            
            $param_email = $email;
            $param_phone = $phone;
            
            if(mysqli_stmt_execute($stmt)){
                $msg = "Subscribe Successful..";
                header("location:Subscribe.php?msg=".$msg);
                
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        
        mysqli_stmt_close($stmt);
    }
    
    
    mysqli_close($link);
}
?>

<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="images/YVSOn3yfOhLKts45byd9.png" type="image/png">
		<title>Subscribe to get Birthday Offers - Tasty Treat</title>
    <meta name="description" content="">
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
	<!-- main css -->
		<link rel="stylesheet" href="css/style.css">

        <!-- Valid JS -->
        <script type="text/javascript" src="js/valid.js"></script>
		<style>
		header .main_menu .navbar
{
	background:#30525E;
}
		.banner_area.subscribe_banner_area {
			background: url('images/XJuuz9SDWBRU7KdSYjes.jpg') no-repeat center;
			background-attachment: fixed;
			padding: 50px 0px;
		}
		.banner_area .text-wrapper h1 {
			color: #fff;
			font-size: 60px;
			text-transform: capitalize;
			margin-bottom: 20px;
		}
		.banner_area .text-wrapper p {
			color:#fafafa;
		}
	</style>
	<!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5ZHM3ZV');</script>
    <!-- End Google Tag Manager -->
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

	<!--================ Start Header Menu Area =================-->
	<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.php">
                    <img src="images/ELYKQR6Km0vlxcxYsNbM.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    
                    <ul class="nav navbar-nav menu_nav justify-content-center mx-auto">



    
    <li class=" nav-item">
        <a class="nav-link" href="Menu.php" target="_self" style="">
            
            <span>Menu</span>
        </a>
            </li>

    
    <li class=" nav-item">
        <a class="nav-link" href="Offers.php" target="_self" style="">
            
            <span>Offers</span>
        </a>
            </li>

    
    <li class="active nav-item">
        <a class="nav-link" href="Subscribe.php" target="_self" style="">
            
            <span>Subscribe</span>
        </a>
            </li>

    
    <li class=" nav-item">
        <a class="nav-link" href="Outlets.php" target="_self" style="">
            
            <span>Outlets</span>
        </a>
            </li>

    
    <li class=" nav-item">
        <a class="nav-link" href="admin.php" target="_self" style="">
            
            <span>Admin</span>
        </a>
            </li>

</ul>


                    
                    <ul class="nav navbar-nav ml-auto search menu-right">
                        <li class="nav-item d-flex align-items-center mr-10">
                            <div class="menu-form">
                                <form>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Search here" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search here'">
                                    </div>
                                </form>
                            </div>
                            <button type="submit" class="search-icon">
                                <i class="far fa-search"></i>
                            </button>
                            <div class="d-flex social_icon">
                               <a target="_blank" href="https://www.facebook.com/tastytreatbd/"><i class="fab fa-facebook-f"></i></a>

    <a target="_blank" href="https://www.instagram.com/tastytreatbd/"><i class="fab fa-instagram"></i></a>

    <a target="_blank" href="https://www.youtube.com/channel/UC-n4N7Ssg4FgjuMrrMv17kw"><i class="fab fa-youtube"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>	<!--================ Header Menu Area =================-->

	<!--================ Start Image Menu Area =================-->
	<section class="image_menu_area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="owl-carousel owl-theme" id="image-menu-owl">
                                            <div class="single_item image_menu_bg_10">
                            <img src="images/KI9G3MPIKbCh453hnxTh.png" class="img-fluid" alt="">
                            <h5>Cake</h5>
                            <a href="/cake" class="overlay"></a>
                        </div>
                                            <div class="single_item image_menu_bg_10">
                            <img src="images/J2k8BuDyktYsFbSYxMtz.png" class="img-fluid" alt="">
                            <h5>Mexican</h5>
                            <a href="/mexican" class="overlay"></a>
                        </div>
                                            <div class="single_item image_menu_bg_10">
                            <img src="images/WGb1CkczRixdMHHVrj4i.png" class="img-fluid" alt="">
                            <h5>Savory</h5>
                            <a href="/savory" class="overlay"></a>
                        </div>
                                            <div class="single_item image_menu_bg_10">
                            <img src="images/January2019/kOx3RnOAAXI2hEFlBBsB.png" class="img-fluid" alt="">
                            <h5>Dessert And Pastry</h5>
                            <a href="/dessert-and-pastry" class="overlay"></a>
                        </div>
                                            <div class="single_item image_menu_bg_10">
                            <img src="images/ZtwtKU5EUzlSlL4cgCJy.png" class="img-fluid" alt="">
                            <h5>Drinks</h5>
                            <a href="/drinks" class="overlay"></a>
                        </div>
                                            <div class="single_item image_menu_bg_10">
                            <img src="images/1TEw0eITR1AVLRWCE5gh.png" class="img-fluid" alt="">
                            <h5>Chicken</h5>
                            <a href="/chicken" class="overlay"></a>
                        </div>
                                            <div class="single_item image_menu_bg_10">
                            <img src="images/xpbJL8qbSzQVnja8acMc.png" class="img-fluid" alt="">
                            <h5>Momo</h5>
                            <a href="/momo" class="overlay"></a>
                        </div>
                                    </div>
            </div>
        </div>
    </div>
</section>	<!--================ End Image Menu Area =================-->

	
<!--================ Start Banner Area =================-->
<section class="container">
	<div class="banner_area subscribe_banner_area">
		<div class="overlay overlay_bg"></div>
		<div class="row justify-content-center align-items-center">
			<div class="col-lg-12">
				<div class="text-wrapper">
					<div class="row justify-content-center">
						<div class="col-lg-12 main_title">
							<h1>Tell Us About You</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
						</div>
					</div>
					<div class="subscribe_form">
						<div class="row justify-content-center">
							<div class="col-lg-10">
								<div class="form-wrap">
									<div class="form_inner">
<?php 
            if (isset($_GET['msg'])) {
                echo $_GET['msg'];
            }
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" name="subscribe" method="post" id="subscribe" onSubmit="return valid(this);">
    
    <h3 class="mb-30">Personal Information</h3>
        <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="first_name">First Name*</label>
                <input  type="text" value="" class="form-control" id="first_name" name="fname" required>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="last_name">Last Name*</label>
                <input  type="text" value="" class="form-control" id="last_name" name="lname" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label for="email">Email*</label>
                <input  type="email" value="" class="form-control" id="email" name="email" required>
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
                <label for="phone">Phone*</label>
                <input  type="tel" value="" class="form-control" id="phone" name="phone" required>
                <span class="help-block"><?php echo $phone_err; ?></span>
            </div>
        </div>
    </div>

    <h3 class="mb-30 mt-60">Birthday</h3>
    <div class="row">
        <div class="col-lg-12">
            <div class="input-group">
                <label class="d-block w-100 text-left" for="first_name">Birthday*</label>
                <input  name="birthday" class="form-control py-2 border-right-0 datepicker" type="search" value="" id="example-search-input" required>
                <span class="input-group-append">
                    <div class="input-group-text bg-transparent">
                        <i class="fa fa-calendar"></i>
                    </div>
                </span>
            </div>
        </div>
    </div>


    <div class="form-check mt-40">
        <input name="agreement_checkbox" type="checkbox" class="form-check-input" id="agreement" required>
        <label class="form-check-label" for="agreement">
            By clicking here, I agree to <strong>Tasty Treat</strong>
            <a href="#">Terms of Use.</a>
        </label>
    </div>
    <div class="text-center mt-50">
        <button type="submit" name="submit" class="primary_btn2">Subscribe</button>
    </div>
</form>									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--================ End Banner Area =================-->



	
	<!--================  Start CTA Two Area =================-->

<!--================  End CTA Two Area =================-->

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
        <a href="https://www.tastytreatbd.com/video-gallery" target="_self" style="">
            
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
