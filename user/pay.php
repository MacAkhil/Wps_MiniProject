<?php
session_start();
$conn = mysqli_connect('localhost','root','','test');
             
            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());        
            }
            else 
            {         
                $userid=$_SESSION['userid'];
                $query="SELECT * from bookings where id=(SELECT max(id) from bookings where userid='$userid' ) ";
                $result=mysqli_query($conn,$query);
                if(mysqli_num_rows($result)==1){
                
                    $row=mysqli_fetch_array($result);
                    $name=$row['name'];
                    $address=$row['address'];
                    $number=$row['number'];
                    $fuel=$row['fuel'];
                    $litres=$row['litres'];
                    $amount=$row['amount'];
                    $date=$row['date'];
                    $time=$row['time'];
                }
                else{
                    echo "Error";
                }
            }
            mysqli_close($conn);
?>
<!DOCTYPE html>
<head>
  <title>Order-Mobile Bunk & Services</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <!--<link rel="icon" src="title-logo.png" type="image/x-icon">-->
  <link rel="icon" href="https://drive.google.com/file/d/1xVkmYjTkS8DTvk6gp8F2B-3QKkiLV_Q2/view?usp=sharing" type="image/x-icon">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">   
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="pay.css">
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
    <div class="container payment">
        <div class="col-12 tag">
          <h4>Your order has been placed!<br></h4>
        </div>
        <div class="col-12">
  <div class="mytable">
  <h3>Payment Receipt</h3><br><br>
  <table>
  <tr>
    <td>Name :</td>
    <td><?php echo $name; ?></td>
  </tr>
  <tr>
    <td>Mobile Number :</td>
    <td><?php echo $number; ?></td>
  </tr>
<tr>
<td>Address :</td>
<td><?php echo $address; ?></td>
</tr>
<tr>
<td>Fuel :</td>
<td><?php echo $fuel; ?></td>
</tr>
<tr>
<td>Litres :</td>
<td><?php echo $litres; ?></td>
</tr>
<tr>
<td>Amount :</td>
<td><?php echo "Rs. ".$amount; ?></td>
</tr>
<tr>
<td>Date :</td>
<td><?php echo $date; ?></td>
</tr>
<tr>
<td>Time :</td>
<td><?php echo $time; ?></td>
</tr>
<tr>
    <td><button onclick="window.print()" id="print">Print</button></td>
</tr>
</table>

</div>
</div>
</div>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</html>
