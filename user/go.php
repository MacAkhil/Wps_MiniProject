<?php
    session_start();
 if($_POST)
 {
     $_SESSION['name']=$_POST['name'];
     $_SESSION['address']=$_POST['address'];
     $_SESSION['contactnumber']=$_POST['number'];
     $_SESSION['fuel']=$_POST['fuel'];
     $_SESSION['litres']=$_POST['litres'];
     $_SESSION['rewardamount']=0;
     if($_SESSION['fuel']=='Petrol'){
      $_SESSION['amount']=$_SESSION['litres']*80;
     }
     else{
        $_SESSION['amount']=$_SESSION['litres']*70;
     }
     if($_SESSION['amount']>1000){
       $_SESSION['rewards']='true';
     }
     else{
       $_SESSION['rewards']='false';
     }
     $userid=$_SESSION['userid'];
     $conn = mysqli_connect('localhost','root','','test');
     
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());        
    }
    else 
    {        
        $query="SELECT * from bookings where userid='$userid' ";
        $result=mysqli_query($conn,$query);
        $query2="SELECT * from mechanic where userid='$userid'";
        $result2=mysqli_query($conn,$query2);
        if(mysqli_num_rows($result)==0 && mysqli_num_rows($result2)==0){
            $_SESSION['firstorder']='true';
        }
        else{
          $_SESSION['firstorder']='false';
        }
    }
    mysqli_close($conn);
 }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Order-Mobile Bunk & Services</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!--<link rel="icon" src="title-logo.png" type="image/x-icon">-->
  <link rel="icon" href="https://drive.google.com/file/d/1xVkmYjTkS8DTvk6gp8F2B-3QKkiLV_Q2/view?usp=sharing" type="image/x-icon">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">   
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
        .navbar{
    background-color: rgb(60, 54, 146);   
    padding: 10px 30px;
    }
    .container{
        /*border:1px;
        border-style:double;
        border-color:rgb(60, 54, 146);*/
        padding:60px 20px;
    }
    table,td{
    font-size: 20px;
    padding:10px;
    } 
    button{
    padding: 10px 30px;
    cursor: pointer;
    color:white;
    border:0;
    border-radius: 30px;
    margin-top:20px;
    }
    button#order{
      background-color: rgb(60, 54, 146);
    }
    button#cancel{
      background-color: rgb(230, 44, 44);
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
      <div class="container" style="margin-top:100px;">
          <div class="col-12">
    <div class="mytable">
    <h3>Payment Confirmation</h3><br><br>
    <table method="POST">
  <tr>
  <td>Fuel :</td>
  <td><?php echo $_SESSION['fuel']; ?></td>
  </tr>
  <tr>
  <td>Litres :</td>
  <td><?php echo $_SESSION['litres']; ?></td>
  </tr>
  <tr>
  <td>Address :</td>
  <td><?php echo $_SESSION['address']; ?></td>
  </tr>
  <tr>
  <td>Amount :</td>
  <td>
  <?php if($_SESSION['firstorder']=='true'){ ?>
  <del><?php 
    echo "Rs. ".$_SESSION['amount']; ?></del>(First order - 20% off)<br>
    <?php 
    $_SESSION['amount']=$_SESSION['amount']-$_SESSION['amount']*0.2; }?>
  <?php if($_SESSION['firstorder']!='true' && $_SESSION['rewards']=='true'){ ?>
  <del><?php 
    echo "Rs. ".$_SESSION['amount']; ?></del>(More than Rs. 1000 - 10% off)<br>
    <?php 
    $_SESSION['rewardamount']=$_SESSION['amount']*0.1;
    $_SESSION['amount']=$_SESSION['amount']-$_SESSION['amount']*0.1; }?>
  <?php
   echo "Rs. ".$_SESSION['amount']."   "; ?></td>
  </tr>
  <tr>
  </table>
  
  </div>
  </div>
  <form method="POST" action="order.php">
        <button name="ordernow" id="order" type="submit-btn" style="margin-left:10px">Order Now</button>
        <button name="cancel" id="cancel" type="submit-btn" style="margin-left:10px">Cancel</button>
  </form>
  </div>
  </body>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

  </html>

