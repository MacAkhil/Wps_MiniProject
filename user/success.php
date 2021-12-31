<?php
session_start();
?>
<!DOCTYPE html>
<head>
    <title>Mobile Bunk & Services</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">   
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="success.css">
  <style>
    #img1, #img2 {
    width: 150px;
    border-radius: 50%;
}
.jumbotron{
    border-radius: 0;
    background-color: white;
}
.split{
  padding:50px;
 
}
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <a class="navbar-brand" href="success.php">
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
            <li class="nav-item">
              <a class="nav-link" href="book.php">Order</a>
            </li>
          </ul>
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
        </div>
      </nav>

      <div class="jumbotron">
        <div class="container">
            <div class="row">
              <div class="col-12 col-sm-6 tag">
                <h4 style="font-size: 30px;">Welcome to Mobile Bunk & Services!</h4><br>
              </div>
            </div>
        </div>
        </div>

        <div class="container split">
          <div class="row align-items-center">
            <div class="col-6  justify-content-center text-center">
              <img src="fuel4.jpg" alt="Order a fuel" id="img1"><br><br>
              <a class="btn btn-sm bookbtn" href="fuel.php" id="b1"><h5>Order Fuel  <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h5></a>
            </div>
            <div class="col-6  justify-content-center text-center">
              <img src="mechanic3.jpg" alt="Book a mechanic" id="img2"><br><br>
              <a class="btn btn-sm bookbtn" href="mechanic.php" id="b2"><h5>Book a mechanic  <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></h5></a>
            </div>
          </div>
        </div>

      <br><br><br>
      <br>

      <div class="container knowus">
        <div class="row">
        <div class="col-6 images">
            <div class="row">
              <div class="col-6 offset-4">
                  <img src="3.jpeg" id="m">
              </div>
            </div>
            <div class="row">
              <div class="col-6 offset-6">
                  <img src="1.jpeg" id="f">
              </div>
            </div>
        </div>
        <div class="col-6 knowcontent">
            <h4>Know Us Better</h4>
            <p>Our main purpose is to help people in case of
                emergencies. Customers don't have to struggle and waste their time to find a petrol bunk or a
                mechanic nearby nor do they have to abandon their vehicles on the road due to lack of fuel or
                vehicle breakdown. They can simply order fuel or mechanic services through our web
                application which will save their time and is very convenient to use.</p>
            <button>Read more here</button>
        </div>
    </div>
</div>


      <div id="offer">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-12">
              <h4 class="text-center">What's in it for you</h4>
            </div><br><br><br><br>
            <div class="col-12 col-md-4 text-center">
              <h5>Doorstep Service</h5><br>
              <img src="express-delivery-services-500x500.png" style="height: 50%;width: 50%;" alt="Doorstep Delivery"><br><br>
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

      <div class="container">
      <h2 class="text-center">Customer Reviews</h2>
    <div id="demo" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="carousel-caption">
                    <p>Mobile Bunk & Services helped me a lot during emergencies. Mechanic service provided is fantastic and at reasonable price. Made my life much easier! </p> <img src="https://i.imgur.com/lE89Aey.jpg">
                    <div id="image-caption">Nick Doe</div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-caption">
                    <p>With our previous method, it was too complicated to procure fuel from petrol pumps. Mobile bunk & Services has made this process very easy for us. It's totally hassle free and good quality fuel is always delivered on time.</p> <img src="https://i.imgur.com/QptVdsp.jpg" class="img-fluid">
                    <div id="image-caption">Cromption Greves</div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="carousel-caption">
                    <p>If Shai Reznik's TDD videos don't convince you to add automated testing your code, I don't know what will.This was the very best explanation of frameworks for brginners that I've ever seen.</p> <img src="https://i.imgur.com/jQWThIn.jpg" class="img-fluid">
                    <div id="image-caption">Harry Mon</div>
                </div>
            </div>
        </div> <a class="carousel-control-prev" href="#demo" data-slide="prev"> <i class='fa fa-arrow-left arr'></i> </a> <a class="carousel-control-next" href="#demo" data-slide="next"> <i class='fa fa-arrow-right arr'></i> </a>
    </div>
</div>

  
      <footer class="footer ">
        <div class="container">
            <div class="row justify-content-center" style="padding: 10px 90px;">             
                <div class="col-4  col-sm-2">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <?php if(isset($_SESSION['auth'])&&$_SESSION['auth']=='true') : ?> 
                            <li><a href="success.php">Home</a></li>
                        <?php else: ?>
                            <li><a href="index.php">Home</a></li>
                        <?php endif; ?>
                        <li><a href="aboutus.php">About Us</a></li>
                        <li>
                          <?php if(isset($_SESSION['auth'])&&$_SESSION['auth']=='true') : ?>  
                            <a href="book.php">Order</a></li>
                          <?php else: ?>
                            <a href="login.php">Order</a>
                            <?php endif; ?>
                        </li>
                        <li><a href="joinus.php">Join Us</a></li>
                        <li><a href="contactus.php">Contact Us</a></li>
                        <?php if(!isset($_SESSION['auth'])||$_SESSION['auth']!='true') : ?>
                          <li><a href="login.php">Login</a></li>
                        <?php endif; ?>
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
                    <div class="links text-center" style="background-color: white;padding: 0;">
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


      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
