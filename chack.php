<?php require("source.php"); 

  if (isset($_GET['edit'])) 
  {
    $id = $_GET['edit'];

    $rec =mysqli_query ($db, "SELECT * FROM cake WHERE id=$id");
    $record = mysqli_fetch_array($rec);
    $image= $record['image'];
    $size= $record['size'];
    $size1= $record['size1'];
    $size2= $record['size2'];
    $title= $record['title'];
    $price= $record['price'];
    $price1= $record['price1'];
    $price2= $record['price2'];
    $id = $record['id'];

  }
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="images/YVSOn3yfOhLKts45byd9.png" type="image/png">
    <title>Welcome - Tasty Treat</title>
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
            .customise
            {
                font-size: 19px;
            }
            table
            {
                width:80%;
                margin:40px auto;
                border-collapse:collapse;
                text-align:left;
            }
            tr
            {
                border-bottom:1px solid #cbcbcb;
            }

            th,td
            {
                border:none;
                height:30px;
                padding:2px;
            }
            tr:hover
            {
                background:#F5F5F5;
            }

            form
            {
                width:60%;
                margin:50px auto;
                text-align:left;
                padding:20px;
                border:1px solid #bbbbbb;
                border-radius:5px;
            }
            .input-group
            {
                margin:10px 0px 10px 0px;
            }
            .input-group label
            {
                display:block;
                text-align:left;
                margin:3px;
                font-weight:bold;
            }
            .input-group input
            {
                height:30px;
                width:90%;
                padding:5px 10px;
                font-size:16px;
                border-radius:5px;
                border:1px solid gray;
            }

            .warper, .warper1
            {
                display: flex;
            }

            .btn
            {
                padding:10px;
                width:100px;
                font-size:15px;
                color:white;
                background:#5F9EA0;
                border:none;
                border-radius:5px;
            }
            .btn1
            {
                padding:10px;
                margin-left:20px;
                width:100px;
                font-size:15px;
                color:white;
                background:#F30404;
                border:none;
                border-radius:5px;
            }
            .msg
            {
                margin:30px auto;
                padding:10px;
                border-radius:5px;
                background:#3c763d;
                width:50%;
                text-align:center;
            }

            .edit_btn
            {
                text-decoration:none;
                padding:2px 5px; 
                background:#2E8B57;
                color:white;
                border-radius:3px;
            }
            .del_btn
            {
                text-decoration:none;
                padding:2px 5px; 
                background:#6C1616;
                color:white;
                border-radius:3px;
            }

            .anitem
            {
                display: flex;
                margin-left: 60%; 
                justify-content: space-around;
                text-align: right;
                box-sizing: border-box;
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

<section class="cake-det">
  <?php if (isset($_SESSION['msg'])): ?>
    <div class="msg">
      <?php 
      echo $_SESSION['msg'];
      unset($_SESSION['msg']); 
      ?>
    </div>
  <?php endif ?>
  <table>
    <thead>
      <tr>
        <td>Id</td>
        <th>Image</th>
        <th>Size</th>
        <th>Size1</th>
        <th>Size2</th>
        <th>Title</th>
        <th>Price</th>
        <th>Price1</th>
        <th>Price2</th>
        <th colspan="2">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php while ($row = mysqli_fetch_array($results)) {?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><img src="<?php echo $row['image']; ?>" height="100px" width="100px"></td>
          <td><?php echo $row['size']; ?></td>
          <td><?php echo $row['size1']; ?></td>
          <td><?php echo $row['size2']; ?></td>
          <td><?php echo $row['title']; ?></td>
          <td><?php echo $row['price']; ?></td>
          <td><?php echo $row['price1']; ?></td>
          <td><?php echo $row['price2']; ?></td>
          <td>
                    <a class="edit_btn" name="edit" href="chack.php?edit=<?php echo $row['id']; ?>">Edit</a>
            </td>

          <td>
            <a class="del_btn"  onclick="return confirm ('Want To Delete!');" href="source.php?del=<?php echo $row['id']; ?>">Remove</a>
          </td>
        </tr>
      <?php } ?>
      
    </tbody>
  </table>

  <div class="anitem"><a href="cake.php" class="btn btn-defult">Add Item</a></div>
  <form action="source.php" method="post" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
        <div class="input-group">
            <label> Select Image :</label>
            <input type="file" name="image" id="file" class="form-control" value="<?php echo $image; ?>" placeholder="Input Picture">
        </div>
        <div class="input-group">
        <input type="text" name="title" class="form-control" value="<?php echo $title; ?>" required="required" placeholder="Input Title">
        </div>
        <div class="warper input-group">
            <div class="col-lg-4">
            <input type="text" name="size" class="form-control" value="<?php echo $size; ?>" required="required" placeholder="Enter 1st Quentity">
            </div>
            <div class="col-lg-4">
            <input type="text" name="size1" class="form-control" value="<?php echo $size1; ?>" required="required" placeholder="Enter 2nd Quentity">
            </div>
            <div class="col-lg-4">
            <input type="text" name="size2" class="form-control" value="<?php echo $size2; ?>" required="required" placeholder="Enter 3rd Quentity">
            </div>
            </div>
            <div class="warper1 input-group">
            <div class="col-lg-4">      
            <input type="text" name="price" class="form-control" value="<?php echo $price; ?>" required="required" placeholder="Enter Price">
            </div>
            <div class="col-lg-4">
            <input type="text" name="price1" class="form-control" value="<?php echo $price1; ?>" required="required" placeholder="Enter Price">
            </div>
            <div class="col-lg-4">
            <input type="text" name="price2" class="form-control" value="<?php echo $price2; ?>" required="required" placeholder="Enter Price">
            </div>  
            </div>
        
        <div class="input-group">
          <?php if($edit_state== 1): ?>
            <button type="submit" name="update" class="btn">Update</button>
            <?php else: ?>.
            <button type="reset" name="reset" class="btn1">Clear</button>
          <?php endif ?>
        </div>
    </form>
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
