 <?php 
    session_start();
    require_once "config.php";
      $email = $phone = "";
      $email_err = $phone_err = "";

      
 if(isset($_POST['submit']))
    {
       $pname = $_POST['title'];
       $pprice = $_POST['price'];
       $quentity = $_POST['quentity'];
       $name = $_POST['name'];
       $email = $_POST['email'];
       $address = $_POST['address'];
       $city = $_POST['city'];
       $phone = $_POST['phone'];
       $state = $_POST['state'];
       $zip = $_POST['zip'];
       $paymethod = $_POST['cradtype'];
       $tdate = $_POST['tdate'];
       $edate = $_POST['edate'];
       $etime = $_POST['etime'];  

        $from = 'shareiarshams30015@gmail.com'; 

        $body =" Your Order Successfully done. We connected with you sortly." ;

        
        $subject = " Buy an Item Submisson ";
        $message = "Name:".$name."\n"."Phone:".$phone."\n"."Wrote the following: "."\n \n".$body;
        $headers = "From: shareiarshams30015@gmail.com";

       require 'PHPMailer-master/PHPMailerAutoload.php';

       $mail = new PHPMailer();
       $mail ->IsSmtp();
       $mail ->SMTPDebug = 1;
       $mail ->SMTPAuth = true;
       $mail ->SMTPSecure = 'ssl';
       $mail ->Host = "smtp.gmail.com";
       $mail ->Port = 587;
       $mail ->IsHTML(true);
       $mail ->Username = "shareiarshams30015@gmail.com";
       $mail ->Password = "ushareiar";
       $mail ->SetFrom("shareiarshams30015@gmail.com");
       $mail ->Subject = $subject;
       $mail ->Body = $message;

        $mail ->AddAddress($email);

      if(mail($email, $subject, $message, $headers))
      {
        echo "mail sent";
      }
      else
      {
        echo "mail not sent";
      }



   if(empty(trim($_POST["email"])))
    {
        $email_err = "Please enter email.";
    } 
    else
    {
        $email = trim($_POST["email"]);
    }
    
 
     if(empty(trim($_POST["phone"])))
    {
        $phone_err = "Please enter a phone.";     
    } 
    elseif(strlen(trim($_POST["phone"])) != 11)
    {
        $phone_err = "phone must have 11 characters.";
    } 
    else
    {
        $phone = trim($_POST["phone"]);
    }


    if(empty($email_err) && empty($phone_err))
    {
        
        $sql = "INSERT INTO payment (pname, pprice, quentity, name, email, address, city, phone, state, zip, paymethod, tdate, edate, etime) VALUES ('$pname', '$pprice', '$quentity', '$name', '$email', '$address', '$city', '$phone', '$state', '$zip', '$paymethod', '$tdate', '$edate', '$etime')";
        $fire=mysqli_query($link,$sql) or die("Can't Insert Data. :( ".mysqli_error($link)); 

        if($fire)
        {
          ?>
          <!doctype html>
          <html lang="en">

          <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="icon" href="images/YVSOn3yfOhLKts45byd9.png" type="image/png">
              <title>Buy - Tasty Treat</title>              
              <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
              <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">

          <style type="text/css">
          .md
            {
              margin: 200px 500px;
              background-size: cover;
              background-color: #282B4B;
              border-radius: 3px;
            }
            .modal-content
            {
              background-color: #81AFB6;
            }
            h2
            {
              color: #206960;
              text-align: center;
              font-size: 35px;

            }
            h4
            {
              color:  #59749B;
              text-align: center;
              font-size: 25px;
            }
            .modal-footer a
            {
              text-align: center;
              justify-content: center;
              margin-right: 40%;
              width: 100px;
              font-size: 20px;
              height: 50px;
            }
            .modal-footer a:hover
            {
              color: #838C82;
              background-color: #080400;
            }

            
            </style>
          </head>
          <body>         
          
                        <div class="md" id="myModal">
                                <div class="container modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <h2>Order Conform Successfull.</h2>
                                            <h4>Chack Your Email</h4>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="main.php" class="btn btn-info" data-dismiss="modal">Okey</a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
          <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
          <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
          <script type = "text/javascript" src = "js/jquery.bpopup.min.js"></script>
          <script>
          $( document ).ready(function() {
              $('#myModal').bPopup();
          });
          </script>
          </body>
          </html>
        <?php } 
        else{
          echo "some problem detected";
        }       
    }    
              
      mysqli_close($link);
    
      
                    
}  

 ?>