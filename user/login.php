<?php
session_start();
if(isset($_SESSION['errormessage'])&&$_SESSION['errormessage']!="none"){
  echo "<script type='text/javascript'>
            alert('" . $_SESSION['errormessage'] . "');
          </script>";
  $_SESSION['errormessage']="none";
}
?>
<html>
<head>
    <title>Login and Registration Form</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                  <i class="fa fa-user" aria-hidden="true" style="color: white;"></i><?php echo "   ".$_SESSION['userid'] ?>
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

    <div class="hero">
        <div class="form-box">
            <div class="button-box">
                <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
            </div>
            <form  action="login1.php" method="POST" id="login" class="inp-grp">
                <input id="id" name="userid" type="text" class="inp-feild" placeholder="USERNAME " required>
                <input id="password" name="password" type="password"  class="inp-feild" placeholder="PASSWORD " required>
                <input type="checkbox" class="checkbox"><span>Remember me</span>
                <button type="submit" name="login" class="submit-btn">Log in</button>
            </form>
            <form action="register1.php" method="POST" id="register" class="inp-grp">
                <input type="text" class="inp-feild" placeholder="USERNAME" name="id" required>
                <input type="email" class="inp-feild" placeholder="EMAIL ID" name="email" required>
                <input type="tel" pattern="[0-9]{10}" class="inp-feild" title="Must contain 10 digits" placeholder="MOBILE NUMBER " name="number" required>
                <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="inp-feild" placeholder="PASSWORD" name="password" id="pass"required>
                <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
                title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="inp-feild" placeholder="CONFIRM PASSWORD" name="confirmpassword" id="confirmpass"required>
                <div class="registrationFormAlert" style="color:black;" id="CheckPasswordMatch">
                <label for="cars" required="">Gender :</label>

                <select name="gender" id="gender">
                        <option value="m">Male</option>3
                        <option value="f">Female</option>
                        <option value="o">Others</option>
                        </select><br><br>
                <button type="submit" name="register" class="submit-btn ">Register</button>
            </form>

        </div>
    </div>
        
  
    
    <script>
        var x = document.getElementById("login");
        var y = document.getElementById("register");
        var z = document.getElementById("btn");

        function register() {
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }

        function login() {
            x.style.left = "50px";
            y.style.left = "400px";
            z.style.left = "0px";
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>