<?php

require_once "config.php";
 
 if(isset($_POST['submit'])){
 $firstname = $_POST['firstname'];
 $lastname = $_POST['lastname'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 }
 $email = $password = $confirm_password = "";
 $email_err = $password_err = $confirm_password_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST")
{
 
    
    if(empty(trim($_POST["email"])))
    {
        $email = "Please enter a Email..";
    } 
    
    else
    {  
        $sql = "SELECT id FROM user WHERE email = ?";
        
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
    

    if(empty(trim($_POST["password"])))
    {
        $password_err = "Please enter a password.";     
    } 
    elseif(strlen(trim($_POST["password"])) < 6)
    {
        $password_err = "Password must have atleast 6 characters.";
    } 
    else
    {
        $password = trim($_POST["password"]);
    }
    
    if(empty(trim($_POST["confirm_password"])))
    {
        $confirm_password_err = "Please confirm password.";     
    }
     else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    if(empty($email_err) && empty($password_err) && empty($confirm_password_err)){
        
        $sql = "INSERT INTO user (firstname, lastname, email, password) VALUES ('$firstname', '$lastname', ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            
            mysqli_stmt_bind_param($stmt, "ss", $param_email, $param_password);
            
            
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            
            if(mysqli_stmt_execute($stmt)){
                $msg = "Registration Successful..";
                header("location:user.php?msg=".$msg);
                
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
		<title>Registration Account - Tasty Treat</title>
    <meta name="description" content="meta description">
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

        <!-- Validation JS -->
        <script src="js/validation.js"></script>
       
	<style>
        .registration-form
        {
            background: url(images/flat_cake.jpg);
            width: 100%;
            height: 700px;
            background-size: cover;
            font-family: Baskerville, "Palatino Linotype", Palatino, "Century Schoolbook L", "Times New Roman", serif; 
            padding-top: 2%;
        }

        .wrap
        {
            max-width: 350px;
            border-radius: 20px;
            margin: auto;
            background: rgba(0,0,0,0.8);
            box-sizing: border-box;
            padding: 40px;
            color: #fff;

        }
         h2
        {
            text-align: center;
            color: #29DABA;
            font-size: 20px;
            margin-bottom: 10px;
        }

         input[type=text], input[type=Email], input[type=Password]
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

        .wrap p
        {
            margin-top: 20px;
        }

        .wrap a
        {
            color: #314C59;
        }

        .wrap a:hover
        {
            color: #22C34C;
        }

        form .help-block
        {
            font-size: 12px;
            text-align: center;

        }
        #fristname_err , #lastname_err
        {
            font-size: 12px;
            text-align: center;
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

    
    <li class=" nav-item">
        <a class="nav-link" href="Subscribe.php" target="_self" style="">
            
            <span>Subscribe</span>
        </a>
            </li>

    
    <li class=" nav-item">
        <a class="nav-link" href="Outlets.php" target="_self" style="">
            
            <span>Outlets</span>
        </a>
            </li>

    
    <li class="active nav-item">
        <a class="nav-link" href="admin.php" target="_self" style="">
            
            <span> Admin</span>
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
</header>	
<!--================ Header Menu Area =================-->


<!--================ Start form Area =================-->
<section class="registration-form">
    <div class="wrap">
        <h2>Sing Up Here For USER</h2>
       
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" name="registration" method="post" id="registation" onSubmit="return validation(this);">
            <div class="form-group">
            <input type="text" name="firstname" placeholder="Enter First Name" required="required">
            <span id="fristname_err"></span>
            </div>
            <div class="form-group">
            <input type="text" name="lastname" placeholder="Enter Last Name" required="required">
            <span id="lastname_err"></span>
            </div>
            <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
            <input type="email" name="email" placeholder="Enter Email" required="required">
            <span class="help-block"><?php echo $email_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <input type="password" name="password" placeholder="Enter Password" required="required">
            <span class="help-block"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
            <input type="password" name="confirm_password" placeholder="Conform Password" required="required">
             <span class="help-block"><?php echo $confirm_password_err; ?></span>
            </div>
            <input type="submit" name="submit" value="Sing Up">
            <p>Already have an account? <a href="user.php">Login here</a>.</p>
        </form>
    </div>
</section>

<!--================ End form Area =================-->

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
	<script src="/js/bootstrap-datepicker.min.js"></script>
	<script src="js/stellar.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	
	<script src="/js/owl.carousel.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7nx22ZmINYk9TGiXDEXGVxghC43Ox6qA"></script>
	<script src="js/theme.js"></script>

    <script type="text/javascript" src="js/global.js"></script>

    <script type="text/javascript" src="vendor/jquery/jquery.min.js"></script>
	
	</body>

</html>