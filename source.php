
<?php

$image="";
$size = "";
$size1 = "";
$size2 = "";
$size3 = "";
$title ="";
$price = "";
$price1 = "";
$price2 = "";
$id=0;
$edit_state = true;

  $db = mysqli_connect('localhost','root', '', 'tastytreat');

  if(!$db)
    {
      die("Connection Failed...".mysqli_connect_error());
    }

    if (isset($_GET['del'])) {
      $id = $_GET['del'];
      mysqli_query($db, "DELETE FROM cake WHERE id=$id ");
      $_SESSION['msg'] = "Account DELETE!";
      header("location: chack.php");
    }

    if (isset($_POST['update'])) 
    {
      
              $image = $_FILES["image"];
             $title = $_POST['title'];
             $size = $_POST['size'];
             $size1  =  $_POST['size1'];
             $size2  = $_POST['size2'];
             $price = $_POST['price'];
             $price1 =  $_POST['price1'];
             $price2 = $_POST['price2'];
             $id = $_POST['id'];

              $filename = $image['name'];
              $fileerror = $image['error'];
              $filetmp = $image['tmp_name'];

              $fileext = explode('.', $filename);
                 $filecheck = strtolower(end($fileext));

                 $fileextstored = array('png', 'jpg', 'jpeg');

              if (in_array($filecheck, $fileextstored)) 
                 {
                    $destinationfile = 'upload/'. $filename;
                    move_uploaded_file($filetmp, $destinationfile);

              $query = "UPDATE cake
                SET
                image  = '$destinationfile',
                size   = '$size',
                size1  = '$size1',
                size2  = '$size2',
                title  = '$title',
                price  = '$price',
                price1 = '$price1',
                price2 = '$price2'
                WHERE id = $id ";
                
                mysqli_query($db,$query);
                $_SESSION['msg']="Item Update";
                header('location:chack.php');
                }
            

      else
      {
        echo "Exception is not Matching";
      }

     }
             


  $results = mysqli_query($db, "SELECT * FROM cake");          
          
 ?>
