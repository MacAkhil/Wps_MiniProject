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
  <link rel="stylesheet" href="aboutus.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <?php if(isset($_SESSION['auth'])&&$_SESSION['auth']!='false'): ?>
            <a class="navbar-brand" href="success.php">
            <img src="IMG_20201116_000518.png" style="width: 60px;height: 28px;padding-right: 10px;" class="d-inline-block align-top" alt="" loading="lazy">
            Mobile Bunk & Services
        </a>
        <?php else: ?>
            <a class="navbar-brand" href="index.php">
            <img src="IMG_20201116_000518.png" style="width: 60px;height: 28px;padding-right: 10px;" class="d-inline-block align-top" alt="" loading="lazy">
            Mobile Bunk & Services
        </a>
        <?php endif; ?>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link active" href="aboutus.php">About Us</a>
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
                  <i class="fa fa-user" aria-hidden="true" style="color: white;"></i><?php echo "   " . $_SESSION["userid"] ?>
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
          
      <div id="about">
        <div class="fuel container">
          <div class="row justfiy-content-center">
          <div class="col-6 fcontent">
            <h4>FUEL AT DOORSTEP</h4>
            <p>We are delivering fuel at the doorstep to all those who find it difficult to procure fuel from the retail outlet (Petrol pump). The conventional procurement process leads to wastage of fuel, leading to environmental damage due to pollution and spillages. Not to forget the time, the manpower and money that the Nation wastes on this way of procurement.</p>
          </div>
          <div class="col-6">
            <img src="5.png" alt="Fuel at doorstep">
          </div>
          </div>
        </div>
        <div class="mechanic container">
          <div class="row justfiy-content-center">
          <div class="col-6">
            <img src="3.jpeg" alt="Mechanic service at doorstep">
          </div>
          <div class="col-6 mcontent">
            <h4>MECHANIC SERVICE AT DOORSTEP</h4>
            <p>We are offering mechanic service at the doorstep to all those who find it difficult to find or go to a repair shop, especially in case of emergencies. Going to a repair shop takes up a lot of time, manpower and money. If there is no repair shop nearby, the only option was to drag your vehicles or leave them behind, but not anymore. With us, you can just book for a service and get it done at your favourable time and place. 
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
                        <?php if(isset($_SESSION['auth'])&&$_SESSION['auth']=='true') : ?> 
                            <li><a href="success.php">Home</a></li>
                        <?php else: ?>
                            <li><a href="index.php">Home</a></li>
                        <?php endif; ?>
                        <li><a href="aboutus.php">About Us</a></li>
                        <li>
                          <?php if(isset($_SESSION['auth'])&&$_SESSION['auth']=='true') : ?>  
                            <a href="book.php">Order</a></li>
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
