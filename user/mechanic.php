<?php
  session_start();
?>

<!DOCTYPE html>
<head>
  <title>Order Fuel-Mobile Bunk & Services</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">   
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="mechanic.css">
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

  <div id="order">
    <div class="container">
      <div class="row">
        <div class="col-12 text-center h4">
          <p>REQUEST MECHANIC</p>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-sm-6 offset-sm-3 col-10 offset-2">     
          <form id="register" class="inp-grp" action="go1.php" method="POST">
            <input type="text" class="inp-feild form-control" placeholder="NAME" name="name" required>
            <input type="text" class="inp-feild form-control" placeholder="ADDRESS" name="address" required>
            <input type="date" class="inp-feild form-control" placeholder="DATE d-m-y" name="date" required>
            <input type="time" class="inp-feild form-control" placeholder="TIME H:m" name="time" required>
            <input type="text" class="inp-feild form-control" pattern="[0-9]{10}" title="Must contain 10 digits"placeholder="MOBILE NUMBER " name="contactnumber" required><br>
            <label for="cars" required="">TWO WHEELER SERVICE:</label><br>
            <select name="2service" placeholder="2 WHEELER SERVICE">
                    <option value="None">None</option>
                    <option value="Vehicle Breakdown">Vehicle Breakdown</option>
                    <option value="Tight Brakes">Tight Brakes</option>
                    <option value="Valve Setting">Valve Setting</option>
                    <option value="Carburettor tuning">Carburettor tuning</option>
                    <option value="Flat tires">Flat tires</option>
            </select><br>
            <label for="cars" required="">FOUR WHEELER SERVICE:</label><br>
            <select name="4service" placeholder="4 WHEELER SERVICE">
                    <option value="None">None</option>
                    <option value="Vehicle Breakdown">Vehicle Breakdown</option>
                    <option value="Warning lights">Warning lights</option>
                    <option value="Sputtering engine">Sputtering engine</option>
                    <option value="Poor fuel economy">Poor fuel economy</option>
                    <option value="Dead Battery">Dead Battery</option>
                    <option value="Flat tires">Flat tires</option>
                    <option value="Brakes squeaking">Brakes squeaking</option>
                    <option value="Alternator failure">Alternator failure</option>
                    <option value="Broken Starter Motor">Broken Starter Motor</option>
                    <option value="Steering Wheel Shaking">Steering Wheel Shaking</option>
                    <option value="Overheating">Overheating</option>
            </select>
        </div>
        <div class="col-12">
            <button type="submit" class="submit-btn mx-auto d-block" name="proceed" >Proceed</button>
        </div>
        </form>
      </div>
    </div>
  </div> 
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>