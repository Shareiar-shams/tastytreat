<?php

session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
require_once "config.php";
 
$email = $password = "";
$email_err = $password_err = "";
 

if($_SERVER["REQUEST_METHOD"] == "POST")
{
 
    
    if(empty(trim($_POST["email"])))
    {
        $email_err = "Please enter email.";
    } 
    else{
        $email = trim($_POST["email"]);
    }
    
 
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty($email_err) && empty($password_err))
    {
    
        $sql = "SELECT id, email, password FROM registration WHERE email =?";
        
        if($stmt = mysqli_prepare($link, $sql))
        {
            
            mysqli_stmt_bind_param($stmt, "s", $param_email);
                       
            $param_email= $email;
                        
            if(mysqli_stmt_execute($stmt))
            {
                
                mysqli_stmt_store_result($stmt);
               
                if(mysqli_stmt_num_rows($stmt) == 1)
                {                    
                    
                    mysqli_stmt_bind_result($stmt, $id, $name, $hashed_password);
                    if(mysqli_stmt_fetch($stmt))
                    {
                           session_start();                                                        
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["name"] = $name;                            
                            
                            header("location: welcome.php");
                        }
                        else
                        {
                            
                            $password_err = "The password you entered was not valid.";
                        }
                    
                    }


                else
                {
                           $email_err = "No account found with that username.";
                }
            } 
            else
            {
                echo "Oops! Something wrong here. Please try again later.";
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
		<title>Admin - Tasty Treat</title>
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
		<style>
            header .main_menu .navbar
            {
                        	background:#30525E;
            }
            .banner_area.category_banner_area 
            {
        			background: url('images/pDh6e4sowdgcCAsoiQNL.jpg') no-repeat center;
		    }

            /* Start form Css */

     .form-login
     {
        padding: 0;
        background:url(images/burger.jpg);
        background-size:cover;
        width:100%;
        height:650px;
        position:relative;
        overflow:hidden;
    }
    
    .conteinar
    {
        width: 350px;
        height: 500px;
        background:#000;
        color:#FBF9F9;
        top: 10%;
        left: 40%;
        border-radius: 10px;
        position:absolute;
        transform:translate(-50% -50%);
        box-sizing:border-box;
        padding:40px 30px;
    }
    
    h3
    {
        background:#FBF9F9;
        color:#000;
        border-radius:5px;
        color:#000000;
        text-align:center;
        font-size:21px;
        margin-top: 5%;
        font:Impact, Haettenschweiler, "Franklin Gothic Bold", "Arial Black", sans-serif;
    }
    
    h4
    {
        margin-top: 2%;
        text-align:center;
        font-size:21px;
        font:Impact, Haettenschweiler, "Franklin Gothic Bold", "Arial Black", sans-serif;
    }
    
    .conteinar label
    {
        margin:0px;
        padding:0px;
        overflow:hidden;
        font-weight:bold;
    }
    
    .conteinar input
    {
        width:100%;
        margin-bottom:20px;
    }
    
    input[type=email], input[type=password] {
        border:none;
        border-bottom:1px solid #D4F3E8;
        background: transparent;
        outline:none;
        height:25px;
        color:#FCFCFC;
        font-size:16px;
        font-family:Constantia, "Lucida Bright", "DejaVu Serif", Georgia, serif;
    }

    input[type = submit], input[type=reset]
    {
        border:none;
        outline:none;
        height:30px;
        font-size:16px;
    }
    input[type = submit]:hover
    {
        cursor:pointer;
        background:#FB0211;
        color:#01FDF9;
    }
    
    input[type = reset]:hover
    {
        cursor:pointer;
        background:#00AF23;
        color:#464D9A;
    }
    
    .conteinar a
    {
        text-decoration:none;
        font-size:14px;
        line-height:10px;
        color:#77fcfd;
    }
    
    .conteinar a:hover
    {
        color:#5B5B5A;
    }
    
    .img
    {
        width:100px;
        height:100px;
        position:absolute;
        left:calc(50% - 50px);
        top:-50px;
        border-radius:60px;
    }
    
    .open
    {
        margin-left:-14px;
    }
    
    .help-block
    {
        font-size:12px;
        text-align:center;
        font-family:"Gill Sans", "Gill Sans MT", "Myriad Pro", "DejaVu Sans Condensed", Helvetica, Arial, sans-serif;
    }
    .refo
    {
        width: 300px;
        height: 100%;
        display: flex;
    }

    
    @keyframes animateOne
    {
        0%
        {
            background-position:0px 0px
        }
        100%
        {
            background-position:100px 650px
        }
    }
    
    @keyframes animateTwo
    {
        0%
        {
            background-position:0px -100px
        }
        100%
        {
            background-position:0px 650px
        }
    }
    @keyframes animateThree
    {
        0%
        {
            background-position:0px 100px
        }
        100%
        {
            background-position:300px 650px
        }
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
<section class="form-login">
<div class="conteinar">

<img src="images/homelogo.png" class="img">
 <?php 
            if (isset($_GET['msg'])) {
                echo $_GET['msg'];
            }
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" id="login" name="login" method="post">
<h3> <b>Admin</b></h2>
<h4>Login Here</h4>

            
             <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label for="name">Email</label>
                <input type="email" name="email" class="form-control" value="" placeholder="example:shareiar@gmail.com" required="required">
                <span class="help-block"><?php echo $email_err; ?></span>
            </div>
                
             <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                <label for="pass"> Password </label>
                <input type="password" name="password" class="form-control" placeholder="Enter User Password" required="required">
                <span class="help-block"><?php echo $password_err; ?></span>
            </div>

<input class="btn btn-success" type="submit" name="submit" value="LogIn">

<input class="btn btn-danger" type="reset" value="Cancel" name="cancel">
<div class="refo">
<div class="col-md-6"><a href="#"> Forget Password?</a></div>

<div class="col-md-6"><a href="registration.php" class="open btn"> Create An Account?</a></div>
</div>
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