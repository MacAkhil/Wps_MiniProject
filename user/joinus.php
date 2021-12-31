<?php
    session_start();
    if(isset($_SESSION['msg'])){
        echo "<script type='text/javascript'>
            alert('" . $_SESSION['msg'] . "');
          </script>";
        unset($_SESSION['msg']);
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="joinus.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
              <a class="nav-link" href="aboutus.php">About Us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="joinus.php">Join Us</a>
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
    
    
    
    <div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <br><br>
                        <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                        <h3><br><br>Welcome</h3><br><br>
                        <!--<a class="btn btn-small" href="login.php" style="background-color: white;border-radius: 20px;color:black;padding:10px 30px;">Login</a><br/>-->
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Employee</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Petrol Pump</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <form  action="employee.php" method="POST" id="emp" enctype="multipart/form-data">
                                <h3 class="register-heading">APPLY AS A EMPLOYEE</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="First Name *" name="empfirstname" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Last Name *" name="emplastname" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Your Email *" name="empemail" required/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" minlength="10" maxlength="10" name="empphone" class="form-control" pattern="[0-9]{10}" title="Must contain 10 digits" placeholder="Your Phone *" value="" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        Driving license:<br>
                                        <div class="form-group">
                                            <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                                            <input type="file" name="license" id="license" value="license" accept=".pdf" required>
                                            *Upload only pdf files.
                                        </div>
                                        Resume:<br>
                                        <div class="form-group">
                                            <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                                            <input type="file" name="resume" id="resume" value="resume" accept=".pdf" required>
                                            *Upload only pdf files.
                                        </div>
                                        <input type="submit" class="btnRegister" id="apply" onclick="apply()" name="apply" value="Apply"/>
                                    </div>
                                </div>
                                </form>
                            </div>
                            <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <form  action="petrolpump.php" method="POST" id="petrolpump">
                                <h3  class="register-heading">TO BECOME A PARTNER</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Name *" name="name"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Petrol Pump Name *" name="petrolpumpname"/>
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email *" name="email" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" maxlength="10" minlength="10" class="form-control" placeholder="Phone *" name="phone" />
                                        </div>


                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="State *" name="state" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="City *" name="city" />
                                        </div>
                                        <!--<div class="form-group">
                                            <select class="form-control">
                                                <option class="hidden"  selected disabled>Please select your Sequrity Question</option>
                                                <option>What is your Birthdate?</option>
                                                <option>What is Your old Phone Number</option>
                                                <option>What is your Pet Name?</option>
                                            </select>
                                        </div>-->
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Message *" name="msg" style="height: 100px;"/>
                                        </div>
                                        <input type="submit" class="btnRegister"  value="Send" name="send"/>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


            <footer class="footer ">
        <div class="container">
            <div class="row justify-content-center" style="padding: 10px 90px;">             
                <div class="col-4  col-sm-2">
                    <h5>Links</h5>
                    <ul class="lsp list-unstyled">
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
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>