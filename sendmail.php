

<?php

	if(isset($_POST['submit']))
	{
		$to = $_POST['email'];
		$name = $_POST['name'];
		$from = 'shareiarshams30015@gmail.com'; 
      	$subject = " Buy an Item Submisson ";
    	$message = "Hi ".$name." Sir "."\n"."Wrote the following: "."\n \n"." Your Order Successfully done. We connected with you sortly.";
      	$headers = "From:".$from;
		
		if(mail($to, $subject, $message, $headers))
     	{
         echo "Mail sent";
      	}
       else
       {
         echo "Mail not sent";
       }
	}
?>
<!DOCTYPE html>
<html>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" href="images/YVSOn3yfOhLKts45byd9.png" type="image/png">
    <title>Admin - Tasty Treat</title>


  <style type="text/css">
	  body {
	  background: #2f313d;
	  color: #46485c;
	  font-family: sans-serif;
			}

		h2 {
		  color: #46485c;
		  font-size: 15px;
		  font-weight: 600;
		  text-align: center;
		  margin-bottom: 10px;
		}

		a {
		  color: #46485c;
		  text-decoration: none;
		}

		.login {
		  width: 250px;
		  position: absolute;
		  top: 50%;
		  left: 50%;
		  margin: -184px 0px 0px -155px;
		  background: rgba(0,0,0,0.2);
		  padding: 20px 30px;
		  border-radius: 5px;
		  box-shadow: 0px 1px 0px rgba(0,0,0,0.3),inset 0px 1px 0px rgba(255,255,255,0.07)
		}

		input[type="text"], input[type="email"] {
		  width: 250px;
		  padding: 25px 0px;
		  background: transparent;
		  border: 0;
		  border-bottom: 1px solid rgba(255,255,255,0.04);
		  outline: none;
		  color: #46485c;
		}
		
		
		input[type="submit"] {
		  background: #b5cd60;
		  border: 0;
		  width: 250px;
		  height: 40px;
		  border-radius: 3px;
		  color: white;
		  cursor: pointer;
		  transition: background 0.3s ease-in-out;
		}
		input[type="submit"]:hover {
		  background: #16aa56;
		}

		.forgot {
		  margin-top: 30px;
		  display: block;
		  font-size: 11px;
		  text-align: center;
		  font-weight: bold;
		}
		.forgot:hover {
		  margin-top: 30px;
		  display: block;
		  font-size: 11px;
		  text-align: center;
		  font-weight: bold;
		  color: #6d7781;
		}



		::-webkit-input-placeholder {
		  color: #46485c;
		}

		[placeholder]:focus::-webkit-input-placeholder {
		  transition: all 0.2s linear;
		  transform: translate(10px, 0);
		  opacity: 0;
		}
  </style>
  
</head>
<body>

 

  <div class='login'>
  <h2>Send Email</h2>
  <form action="" method="post">
  <input name='name' placeholder='Enter User name' type='text'/>
  <input id='Email' name='email' placeholder='Enter user email' type='email'/>
  <div class='remember'>
    
  <input type='submit' name='submit' value='Send Mail'/>
  <a class='forgot' href='#'>G0 B@ck</a>
  </form>
</div>


<script type="text/javascript">
	//show password
$(document).ready(function(){
    $("#pw").focus(function(){
        this.type = "text";
    }).blur(function(){
        this.type = "password";
    })   
});

//Placeholder fixed for Internet Explorer
$(function() {
    var input = document.createElement("input");
    if(('placeholder' in input)==false) { 
        $('[placeholder]').focus(function() {
            var i = $(this);
            if(i.val() == i.attr('placeholder')) {
                i.val('').removeClass('placeholder');
                if(i.hasClass('email')) {
                    i.removeClass('email');
                    this.type='email';
                }           
            }
        }).blur(function() {
            var i = $(this);    
            if(i.val() == '' || i.val() == i.attr('placeholder')) {
                if(this.type=='email') {
                    i.addClass('email');
                    this.type='text';
                }
                i.addClass('placeholder').val(i.attr('placeholder'));
            }
        }).blur().parents('form').submit(function() {
            $(this).find('[placeholder]').each(function() {
                var i = $(this);
                if(i.val() == i.attr('placeholder'))
                    i.val('');
            })
        });
    }
    });
</script>

  </body>

</html>
