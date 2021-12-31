<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>

  <title>Profile-Mobile Bunk & Services</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">   
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="profile.css">

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
                    <a class="dropdown-item" href="#" style="color: black;">Profile</a>
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

    <div class="container page" style="margin-top:70px;">
    <div class="tab">
        <img src="user1.png">
        <button class="tablinks" onclick="openCity(event, 'my')" id="defaultOpen">MY DETAILS</button>
        <button class="tablinks" onclick="openCity(event, 'order')">MY ORDERS</button>
        <button class="tablinks" onclick="openCity(event, 'reward')">REWARDS</button>
        <button class="tablinks" onclick="openCity(event, 'support')">SUPPORT</button>
        <button style="background-color:white;"></button>
        <button style="background-color:white;"></button>
        <button class="tablinks" onclick="openCity(event, 'joinus')">JOIN US</button>
    </div>
    <div id="my" class="tabcontent">
        <h6>MY DETAILS</h6><br>
        <div class="details">
          <table>
          <tr>
    <td>Username</td>
    <td><?php echo ":  ".$_SESSION['userid']; ?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td><?php echo ":  ".$_SESSION['email']; ?></td>
  </tr>
  <tr>
    <td>Mobile Number</td>
    <td><?php echo ":  ".$_SESSION['number']; ?></td>
  </tr>
  <tr>
    <td>Password</td>
    <td><?php echo ":  ".$_SESSION['password']; ?></td>
  </tr>
  <tr>
    <td>Gender</td>
    <td>
      <?php 
        if($_SESSION['gender']=='f'){
          echo ":  "."Female";
        }
        else if($_SESSION['gender']=='m'){
          echo ":  "."Male";
        }
        else{
          echo ":  "."Others";
        }
         ?>
    </td>
  </tr>
</table>
        </div>
    </div>
    <div id="order" class="tabcontent">
        <h6>MY ORDERS</h6><br>
        <div class="container orders">
          <h6>Fuel orders:<br></h6>
        <?php
       
    $conn = mysqli_connect('localhost','root','','test');
     
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());        
    }
    else
    {        
        $userid=$_SESSION['userid'];
        $query="SELECT * from bookings where userid='$userid' ";
        $result=mysqli_query($conn,$query);
        while($row=mysqli_fetch_array($result))
        {
          ?>
            <p> <?php echo "Date : ". $row['date'] ."  "."      Time : ".$row["time"] ?></p>
            <p> <?php echo "Fuel : ". $row['fuel']  ?></p>
            <p> <?php echo "Litres : ". $row['litres']  ?></p>
            <p> <?php echo "Amount : "."  Rs. ". $row['amount']  ?></p><hr>
          
          <?php
        }    
    }
    mysqli_close($conn);
?>
<h6>Mechanic Services:<br></h6>
<?php
       
       $conn = mysqli_connect('localhost','root','','test');
        
       if (mysqli_connect_errno()) {
           printf("Connect failed: %s\n", mysqli_connect_error());        
       }
       else 
       {        
           $userid=$_SESSION['userid'];
           $query="SELECT * from mechanic where userid='$userid' ";
           $result=mysqli_query($conn,$query);
           while($row=mysqli_fetch_array($result))
           {
             ?>
               <p> <?php echo "Date : ". $row['orderdate'] ."   "."     Time : ".$row["ordertime"] ?></p>
               <p> <?php if($row['4service']=='None') {
                 echo "Two-wheeler Mechanic Service : ". $row['2service'];
                }
               else{
                echo "Four-wheeler Mechanic Service : ". $row['4service'];
               }?></p>
               <p> <?php echo "Amount : ". "  Rs. ".$row['amount']  ?></p><hr>
             
             <?php
           }    
       }
       mysqli_close($conn);
   ?>

  </div>
    </div>

    <div id="reward" class="tabcontent rewards">
        <h6>REWARDS</h6>
        <h6>First Order - 20% off</h6></p>
        
        <?php $conn = mysqli_connect('localhost','root','','test');
     
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());        
    }
    else
    {        
        $userid=$_SESSION['userid'];
        $query="SELECT * from bookings where id=(select min(id) from bookings where userid='$userid') ";
        $result=mysqli_query($conn,$query);
        $query2="SELECT * from mechanic where id=(select min(id) from mechanic where userid='$userid') ";
        $result2=mysqli_query($conn,$query2);
        $row1=mysqli_fetch_array($result);
        $row2=mysqli_fetch_array($result2);

        if(!empty($row1)&&!empty($row2)){
        ?>
        <?php 
            if(($row1['date']<$row2['orderdate']) || ($row1['date']==$row2['orderdate'] && $row1['time']<$row2['ordertime'])): ?>
            <p> <?php echo "Date : ". $row1['date'] ."  "."      Time : ".$row1["time"] ?></p>
            <p> <?php echo "Fuel : ". $row1['fuel']  ?></p>
            <p> <?php echo "Litres : ". $row1['litres']  ?></p>
            <p> <?php echo "Amount : "."  Rs. ". $row1['amount']  ?></p>
            <p> <?php echo "Discounted Amount : "."  Rs. ".(($row1['amount']*0.2)/0.8);  ?></p><hr>
          <?php else: ?>
            <p> <?php echo "Date : ". $row2['orderdate'] ."   "."     Time : ".$row2["ordertime"] ?></p>
               <p> <?php if($row2['4service']=='None') {
                 echo "Two-wheeler Mechanic Service : ". $row2['2service'];
                }
               else{
                echo "Four-wheeler Mechanic Service : ". $row2['4service'];
               }?></p>
               <p> <?php echo "Amount : ". "  Rs. ".$row2['amount']  ?></p>
               <p> <?php echo "Discounted Amount : "."  Rs. ".(($row2['amount']*0.2)/0.8);  ?></p><hr>
          <?php endif; ?>  
        <?php   
        }
        else if(empty($row1) && !empty($row2)){ ?>
        <p> <?php echo "Date : ". $row2['orderdate'] ."   "."     Time : ".$row2["ordertime"] ?></p>
               <p> <?php if($row2['4service']=='None') {
                 echo "Two-wheeler Mechanic Service : ". $row2['2service'];
                }
               else{
                echo "Four-wheeler Mechanic Service : ". $row2['4service'];
               }?></p>
               <p> <?php echo "Amount : ". "  Rs. ".$row2['amount']  ?></p>
               <p> <?php echo "Discounted Amount : "."  Rs. ".(($row2['amount']*0.2)/0.8);  ?></p><hr>
        <?php
        }
        else if(empty($row2) && !empty($row1)){ ?>
        <p> <?php echo "Date : ". $row1['date'] ."  "."      Time : ".$row1["time"] ?></p>
            <p> <?php echo "Fuel : ". $row1['fuel']  ?></p>
            <p> <?php echo "Litres : ". $row1['litres']  ?></p>
            <p> <?php echo "Amount : "."  Rs. ". $row1['amount']  ?></p>
            <p> <?php echo "Discounted Amount : "."  Rs. ".(($row1['amount']*0.2)/0.8);  ?></p><hr>

        <?php
        }
    }
    mysqli_close($conn); ?>
        
        <br>
        <h6>More than Rs. 1000 - 10% off</h6><br>
        <?php $conn = mysqli_connect('localhost','root','','test');
     
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());        
    }
    else
    {        
        $userid=$_SESSION['userid'];
        $query="SELECT * from bookings where userid='$userid' and reward>0 ";
        $result=mysqli_query($conn,$query);
        while($row=mysqli_fetch_array($result))
        {
          ?>
            <p> <?php echo "Date : ". $row['date'] ."  "."      Time : ".$row["time"] ?></p>
            <p> <?php echo "Fuel : ". $row['fuel']  ?></p>
            <p> <?php echo "Litres : ". $row['litres']  ?></p>
            <p> <?php echo "Amount : "."  Rs. ". $row['amount']  ?></p>
            <p> <?php echo "Discounted Amount : "."  Rs. ". $row['reward']  ?></p><hr>
          <?php
        }    
    }
    mysqli_close($conn); ?>

    </div>
    <div id="support" class="tabcontent">
        <h6>SUPPORT</h6>
        <section class="accordion-section clearfix mt-3" aria-label="Question Accordions">
    <div class="container">
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          <div class="panel panel-default">
            <div class="panel-heading p-3 mb-3" role="tab" id="heading0">
              <h3 class="panel-title">
                <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse0" aria-expanded="true" aria-controls="collapse0" style="color:black">
                  How can I order?
                </a>
              </h3>
            </div>
            <div id="collapse0" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading0">
              <div class="panel-body px-3 mb-4">
                <p>Follow the below mentioned steps to order</p>
                <ul>
                  <li>Click on book now in the home page or Order in the navigation bar.</li>
                  <li>You can see two options, Order fuel on the left and Book a mechanic on the right. Choose one according to your requirement.</li>
                  <li>You will be redirected to the booking page. Fill in the details and click on Order Now/Request Now.</li>
                  <li>Lay back and wait for your order to be delivered!</li>
                </ul>
              </div>
            </div>
          </div>
          
          <div class="panel panel-default">
            <div class="panel-heading p-3 mb-3" role="tab" id="heading1">
              <h3 class="panel-title">
                <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse1" aria-expanded="true" aria-controls="collapse1" style="color:black">
                  What are the different offers available?
                </a>
              </h3>
            </div>
            <div id="collapse1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading1">
              <div class="panel-body px-3 mb-4">
                <p>There is 20% off on first order and 10% off on orders above Rs. 1000.</p></div>
            </div>
          </div>
          
          <div class="panel panel-default">
            <div class="panel-heading p-3 mb-3" role="tab" id="heading2">
              <h3 class="panel-title">
                <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse2" aria-expanded="true" aria-controls="collapse2" style="color:black">
                  How to get hired as a driver?
                </a>
              </h3>
            </div>
            <div id="collapse2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading2">
              <div class="panel-body px-3 mb-4">
                <p>You can find a tab named join us on the left corner or in the navigation bar.<br> Click on it, enter the details and submit. Wait for contact from us.</p></div>
            </div>
          </div>
          
          <div class="panel panel-default">
            <div class="panel-heading p-3 mb-3" role="tab" id="heading3">
              <h3 class="panel-title">
                <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse3" aria-expanded="true" aria-controls="collapse3" style="color:black">
                What are the documents required for applying as a driver? 
                </a>
              </h3>
            </div>
            <div id="collapse3" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading3">
              <div class="panel-body px-3 mb-4">
                <p>You need<br>1. Driving license<br>2. Resume<br>(Both in pdf format only)</p></div>
            </div>
          </div>
        </div>
    
    </div>
  </section>
    </div>
    <div id="joinus" class="tabcontent">
        <h6>JOIN US</h6>
        <p>You can start earning with us!<br> Check out our employment oppotunities <a href="joinus.php">here.</a></p>
    </div>
</div>

    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }
        // Get the element with id="defaultOpen" and click on it
        document.getElementById("defaultOpen").click();
    </script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

 </body>
</html>