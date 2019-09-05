<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
$id = $_GET['edit'];
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
    case "add":
        if(!empty($_POST["quantity"])) {
        
            $productByCode = $db_handle->runQuery("SELECT * FROM cake WHERE id='" . $id . "'");
            $itemArray = array($productByCode[0]["id"]=>array'id'=>$productByCode[0]["id"],('name'=>$productByCode[0]["name"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
            
            if(!empty($_SESSION["cart_item"])) {
                if(in_array($productByCode[0]["id"],array_keys($_SESSION["cart_item"]))) {
                    foreach($_SESSION["cart_item"] as $k => $v) {
                            if($productByCode[0]["id"] == $k) {
                                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                    }
                } else {
                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                }
            } else {
                $_SESSION["cart_item"] = $itemArray;
            }
        }
    break;
    case "remove":
        if(!empty($_SESSION["cart_item"])) {
            foreach($_SESSION["cart_item"] as $k => $v) {
                    if($_GET["code"] == $k)
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
    <title>Buy - Tasty Treat</title>
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
  <!-- main css -->
    <link rel="stylesheet" href="css/style.css">

        <style type="text/css">

        .cartoption
        {
            font-size: 19px;
        }

            table
            {

              width: 100%;
              margin: 30px auto;
              border-collapse: collapse;
              text-align: left;
            }
             tr
            {
              border-bottom: 1px solid #cbcbcb;
            }
            tr:hover
            {
              background: #F5F5F5;
            }
           th, td
            {
              border: none;
              height: 30px;
              padding: 2px;
              font-size: 16px;
              margin: auto;
              text-align: center;
            }
            .image
            {
                width: 200px;
                height: 200px;
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
        <a class="nav-link" href="offers.php" target="_self" style="">
            
            <span>Offers</span>
        </a>
            </li>

    
    <li class=" nav-item">
        <a class="nav-link" href="Subscribe.php" target="_self" style="">
            
            <span>Subscribe</span>
        </a>
            </li>

    
    <li class=" nav-item">
        <a class="nav-link" href="outlets.php" target="_self" style="">
            
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
</header> 
<!--================ End Header Area  =================-->

<section class="cartoption container">
    <div class="cartdesign">
        <h1 style="color: #755937;">Shoping Cart</h1>
        <div class="fwd">
            <table>
                <tr>
                    <th>Sri.No</th>
                    <th>EMI</th>
                    <th>Picture</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                     <th>Price</th>
                    <th>Remove</th>
                </tr>

               <tbody>
                
                <?php
                    if(isset($_GET['edit']))
                    {
                    $id = $_GET['edit'];                  
                    $query = "SELECT * FROM cake WHERE id=$id";
                    $read = mysqli_query($con,$query);
                    if (mysqli_num_rows($read)>0) 
                    {
                        while ($row=mysqli_fetch_array($read)) {
                                         
    
                ?>
                
                <form action="cartpayment.php" method="post">
                <tr>
                    <td>1</td>
                    <td>No Emi</td>
                    <td><img class="image" src="<?php echo $row['image']; ?>"></td>
                    <input type="hidden" name="image" value="<?php echo $row['image']; ?>">
                
            
                <td><?php echo $row['title']; ?></td>
                <input type="hidden" name="title" value="<?php echo $row['title']; ?>">
                
                <td><input style="border:0px; border-bottom: 1px dotted #000; " type="text" name="sze" value="" placeholder="Input Size.."></td>
                <td>
                    <input style="border:0px; border-bottom: 1px dotted #000; " type="number" name="qnt"  placeholder="How Many You want?" value="kg">
                </td>
                <td></td>
                <td><button type="reset" name=""><i class="fal fa-cut"></i></button></td>
                <input style="margin-left: 90%;" class="btn btn-dark" type="submit"  name="update" value="Update Lists">
            </form>
            </tr>

                <?php 
            
        }
    } 
} 
?>
            </tbody>
             </table>
        </div>
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
        <a href="contact.php" target="_self" style="">
            
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
        <a href="logout.php" target="_self" style="">
            
            <span>Log Out</span>
        </a>
    </li>

    <li class="">
        <a href="reset.php" target="_self" style="">
            
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
  
  <script src="js/owl-carousel/owl.carousel.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA7nx22ZmINYk9TGiXDEXGVxghC43Ox6qA"></script>
  <script src="js/theme.js"></script>
  
  
</body>

</html>
