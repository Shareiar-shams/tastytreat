<?php 
    require_once "cpayment.php";   

    
        $id = $_GET['action'];
      
        $query = "SELECT * FROM cake  WHERE id=$id";
        $read = mysqli_query($link,$query);
        if (mysqli_num_rows($read)>0) 
        {
          while ($row=mysqli_fetch_array($read)) 
          {
            $price = $row['price'];
            $title = $row['title'];
            $quentity = 2;
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

        .buy{
          font-family: Arial;
          font-size: 17px;
          padding: 8px;
        }
        h2{
        text-align:left;
        }

        * {
          box-sizing: border-box;
        }

        .row {
          display: -ms-flexbox; /* IE10 */
          display: flex;
          -ms-flex-wrap: wrap; /* IE10 */
          flex-wrap: wrap;
          margin: 0 -10px;
        }

        .col-25 {
          -ms-flex: 25%; /* IE10 */
          flex: 25%;
        }
        .col-35
        {
            -ms-flex: 25%; /* IE10 */
            flex: 25%;
        }

        .col-50 {
          -ms-flex: 50%; /* IE10 */
          flex: 50%;
        }

        .col-75 {
          -ms-flex: 75%; /* IE10 */
          flex: 75%;
        }

        .col-25,
        .col-35,
        .col-50,
        .col-75 {
          padding: 0 16px;
        }

        .containe {
          background-color: #cfcccc85;
          padding: 3px 18px 13px 18px;
          border: 1px solid lightgrey;
          border-radius: 3px;
        }

        input[type=text], input[type=date], input[type=number], input[type=time] {
          width: 100%;
          margin-bottom: 20px;
          padding: 12px;
          border: 1px solid #ccc;
          border-radius: 3px;
        }

        label {
          margin-bottom: 10px;
          display: block;
        }
        .creditCardType
        {
          width: 100%;
          font-size: 15px;
          font-family: sans-serif;
          padding: 12px;
          border: 1px solid #ccc;
          border-radius: 3px; 
        }

        .icon-container {
          margin-bottom: 20px;
          padding: 7px 0;
          font-size: 24px;
        }

        .btn {
          color: white;
          padding: 12px;
          margin: 10px 0;
          border: none;
          width: 100%;
          border-radius: 3px;
          cursor: pointer;
          font-size: 17px;
        }

        .btn:hover {
          background-color: #45a049;
        }

        a {
          color: #2196F3;
        }

        hr {
          border: 1px solid lightgrey;
        }

        
        .containe input[type=submit]
        {
              padding: 15px 25px;
              font-size: 24px;
              text-align: center;
              cursor: pointer;
              outline: none;
              color: #fff;
              background-color: #6F0101;
              border: none;
              border-radius: 15px;
              box-shadow: 0 9px #999;
        }
        

        .containe input[type=submit]:hover {background-color: #216364}

        .containe input[type=submit]:active 
        {
          background-color: #3e8e41;
          box-shadow: 0 5px #666;
          transform: translateY(4px);
        }

        span.price, span.product {
          float: right;
          color: grey;
        }

        /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
        @media (max-width: 800px) {
          .row {
            flex-direction: column-reverse;
          }
          .col-25, .col-35 {
            margin-bottom: 20px;
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

<section class="buy container">
    <h2 style="color: #773C3C;">Checkout Form</h2>
    <div class="row">
      <div class="col-75">
        <div class="containe">
          <form action="cpayment.php" method="post">
          
            <div class="row">
              <div class="col-50">
                <h3 style="margin-bottom: 17px;">Billing Address</h3>

                

                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="title" value="<?php echo $title; ?>">
                <input type="hidden" name="price" value="<?php echo $price; ?>">
                <input type="hidden" name="quentity" value="<?php echo $quentity; ?>">
            
                

                <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" required="required">

                <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                <input type="text" id="email" name="email" placeholder="tastytreat@example.com" required="required">
                <span class="help-block"><?php echo $email_err; ?></span>
                </div>

                <label for="adr"><i class="fas fa-home"></i> Address</label>
                <input type="text" id="adr" name="address" placeholder="542 W. 15th Street" required="required">

                <label for="city"><i class="fa fa-institution"></i> City</label>
                <input type="text" id="city" name="city" placeholder="Sylhet" required="required">

                <div class="form-group <?php echo (!empty($phone_err)) ? 'has-error' : ''; ?>">
                <label for="phone"><i class="fa fa-phone"></i> Phone</label>
                <input type="number" id="phone" name="phone" placeholder="01XX-XXXXXX" required="required">
                <span class="help-block"><?php echo $phone_err; ?></span>
                </div>

                <div class="row">
                  <div class="col-50">
                    <label for="state"><b>Upozela</b></label>
                    <input type="text" id="state" name="state" placeholder="Sylhet" required="required">
                  </div>
                  <div class="col-50">
                    <label for="zip"><b>Zip</b></label>
                    <input type="text" id="zip" name="zip" placeholder="3100">
                  </div>
                </div>
              </div>

              <div class="col-50">
                <h3>Payment</h3>
                <label for="fname"><b>Accepted Cards</b></label>
                <div class="icon-container">

              <select class="creditCardType" name="cradtype">
                  <option value="Pay On Delivery" selected="selected">Pay On Delivery</option>
              </select>
                  
                  
                </div>
                
                <div class="row">
                  <div class="col-50">
                    <label for="expmonth"><b>Today Date</b></label>
                    <input type="date" id="date" name="tdate" placeholder="01/01/2019" required="required">
                  </div>
                  <div class="col-50">
                    <label for="expyear"><b>When You Want</b></label>
                    <p style="font-size: 10px;">Remember keep distance 1 day between your need time to today's time. Please! </p>
                    <input type="date" id="date" name="edate" placeholder="03/01/2019" required="required">
                  </div>
                </div>
                <div class="row">
                    <div class="col-50">
                    <label for="expmonth"><b>Enter Excute Time</b></label>
                    <input type="time" id="time" name="etime" placeholder="02.30 PM" required="required">
                  </div>
                </div>
              </div>
              
            </div>
            <label>
              <input type="checkbox" checked="checked" name="sameadr"> Shopping address same as billing
            </label>
            <input type="submit"  name="submit" value="Continue to checkout" class="btn btn-success">
          </form>
        </div>
      </div>
      <div class="col-25">
        <div class="containe">
            
                        <?php
                           $id= $_GET['action'];  
                            $query1 = "SELECT * FROM cake  WHERE id=$id";
                            $read = mysqli_query($link,$query1);
                            if (mysqli_num_rows($read)>0) 
                            {
                                while ($row=mysqli_fetch_array($read)) {

                            ?>
          <h4>Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i></span></h4>
          <div class="mx-auto" style="margin-top: 10px;"><img style="width: 200px; height: 200px; text-align: center;" src="<?php echo $row['image'] ?>"></div>
          <div style="margin-top: 10px;"><p> <b><?php echo $row['title']; ?></b> <span class="price">৳ <?php echo $row['price']; ?></span></p></div>
          <hr>
          <p>Total <span class="price" style="color:black"><b>৳<?php echo $row['price']; ?></b></span></p>
       <?php }} ?>
        </div>
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
