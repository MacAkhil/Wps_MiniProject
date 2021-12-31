<?php 
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Mobile Bunk & Services</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!--<link rel="icon" src="title-logo.png" type="image/x-icon">-->
  <link rel="icon" href="https://drive.google.com/file/d/1xVkmYjTkS8DTvk6gp8F2B-3QKkiLV_Q2/view?usp=sharing" type="image/x-icon">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">   
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="home.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <a class="navbar-brand" href="index.php">
            <img src="IMG_20201116_000518.png" style="width: 60px;height: 28px;padding-right: 10px;" class="d-inline-block align-top" alt="" loading="lazy">
            Mobile Bunk & Services
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="aboutus.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="joinus.php">Join Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contactus.php">Contact Us</a>
            </li>
            <?php if(isset($_SESSION['auth'])&&$_SESSION['auth']!='false'): ?>
              <li class="nav-item">
                <a class="nav-link" href="book.php">Order</a>
              </li>
            <?php endif; ?>
          </ul>
          <?php if(isset($_SESSION['auth'])&&$_SESSION['auth']=='true') : ?>
            <span class="navbar-text" style="text-align: right;">
                <div class="dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa fa-user" aria-hidden="true" style="color: white;"></i><?php echo "   " . $_SESSION["userid"]  ?>
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="profile.php" style="color: black;">Profile</a>
                    <a class="dropdown-item" href="logout.php" style="color: black;"><i class="fa fa-sign-out" aria-hidden="true"></i>
                    Logout</a>
                  </div>
                </div>
            </span>
                
          <?php else: ?>
                <span class="navbar-text" style="text-align: right;">
                <a id="loginbutton" href="login.php" style="text-decoration: none;">
                <span class="fa fa-sign-in"></span> Login/Sign up</a>
                </span>
          <?php endif;?>
        </div>
      </nav>

      <div class="jumbotron">
      <div class="container">
					<div class="row">
						<div class="col-6 tag">
              <h1 class="text-left" style="font-size: 60px;">Get your Fuel and Vehicles ready<br>Anytime, Anywhere!</h1><br>
              <?php if(isset($_SESSION['auth'])&&$_SESSION['auth']=='true') : ?>
                <a id="makeyourtrip" class="btn btn-sm bookbtn" href="book.php"><h4>Book now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h4></a>
              <?php else: ?>
                <a id="makeyourtrip" class="btn btn-sm bookbtn" href="login.php"><h4>Book now <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h4></a>
              <?php endif; ?>
            </div>
            <div class="col-6">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="2.jpeg" alt="First slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="3.jpeg" alt="Second slide">
                </div>
              </div>
            </div>
            </div>
        </div>
      </div>
      </div>


      <div id="offer">
      <div class="container">
        <div class="row justify-contents-center">
          <div class="col-12">
            <h3 class="text-center"><strong>What's in it for you</strong><hr style="width:220px;"></h3>
          </div><br><br><br><br>
          <div class="col-12 col-md-4 text-center">
            <h5>Doorstep Service</h5><br>
            <img src="express-delivery-services-500x500.png" style="height: 50%;width: 50%;" alt="Doorstep Delivery" /> <br><br>
            <p>Rely on us for easy and quick doorstep fuel delivery and mechanic service.</p>
          </div>
          <div class="col-12 col-md-4 text-center">
            <h5>Affordability</h5><br>
            <img src="4677a2_7c3e235267894eea84b697b8e5442921_mv2.png" style="height: 50%;width: 50%;" alt="Affordable"><br><br> 
            <p>Our prices are transparent and suit your pocket. We offer afforadable services.</p>
          </div>
          <div class="col-12 col-md-4 text-center">
            <h5>On Time</h5><br>
            <img src="partnerlogo.png" style="height: 50%;width: 50%;" alt="Quick and on time"><br><br>
            <p>We deliver fuel and provide mechanic serivce on time and in an efficient manner.</p>
          </div>
        </div>
      </div>
    </div>

    <footer class="footer ">
      <div class="container">
          <div class="row justify-content-center" style="padding: 10px 90px;">             
              <div class="col-4  col-sm-2">
                  <h5>Links</h5>
                  <ul class="list-unstyled">
                      <li><a href="index.php">Home</a></li>
                      <li><a href="aboutus.php">About Us</a></li>
                      <!--<li><a href="book.php">Order</a></li>-->
                      <li><a href="joinus.php">Join Us</a></li>
                      <li><a href="contactus.php">Contact Us</a></li>
                      <li><a href="login.php">Login</a></li>
                  </ul>
              </div>
              <div class="col-7 col-sm-5">
                  <h5>Address</h5>
                  <address>
                  Vasavi College of Engineering<br>
Affiliated to Osmania University, Hyderabad<br>
Approved by AICTE, New Delhi<br>
9-5-81, Ibrahimbagh<br>
Hyderabad - 500 031<br>
Telangana, India<br>
                <i class="fa fa-phone fa-lg"></i> +91 40 9876321<br>
                <i class="fa fa-fax fa-lg"></i> +91 40 9876310<br>
                <i class="fa fa-envelope fa-lg"></i><a style="color:white" href="mailto:">mobilebunk.services@gmail.com</a>
             </address>
              </div>
              <div class="icons col-12 col-sm-5 align-self-center">
                  <div class="links text-center">
                      <a class="btn btn-social-icon btn-google" href="http://google.com/+"><i class="fa fa-google-plus"></i></a>
                      <a class="btn btn-social-icon btn-facebook" href="http://www.facebook.com/profile.php?id="><i class="fa fa-facebook"></i></a>
                      <a class="btn btn-social-icon btn-linkedin" href="http://www.linkedin.com/in/"><i class="fa fa-linkedin"></i></a>
                      <a class="btn btn-social-icon btn-twitter" href="http://twitter.com/"><i class="fa fa-twitter"></i></a>
                      <a class="btn btn-social-icon btn-google" href="http://youtube.com/"><i class="fa fa-youtube"></i></a>
                      <a class="btn btn-social-icon " href="mailto:"><i class="fa fa-envelope-o"></i></a>
                  </div>
              </div>
         </div>
         <div class="row justify-content-center">             
              <div class="col-auto">
                  <p>© Mobile Bunk & Services Copyright 2020</p>
              </div>
         </div>
      </div>
  </footer>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>