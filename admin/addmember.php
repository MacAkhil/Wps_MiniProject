<?php 

use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
  
require '../vendor/autoload.php'; 
    session_start();
    if(isset($_POST['add'])){
        $id=$_POST['appid'];

        $conn = mysqli_connect('localhost','root','','test');
     
        if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());        
        }
	    else {
        $query1="select * from employee where id='$id'";
        $result1=mysqli_query($conn,$query1);
        $row=mysqli_fetch_array($result1);

        $firstname=$row['firstname'];
        $lastname=$row['lastname'];
        $phone=$row['phone'];
        $email=$row['email'];
        $license=$row['license'];
        $resume=$row['resume'];

	      $query="insert into members(firstname,lastname,email,phone,license,resume) values('$firstname','$lastname','$email',$phone,'$license','$resume')";
        $result=mysqli_query($conn,$query);

        $query2="delete from employee where id='$id'";
        $result2=mysqli_query($conn,$query2);

        $_SESSION['addemp']='Member added successfully';
        $mail = new PHPMailer(true);                                        
        $mail->isSMTP(); 
        $mail->CharSet = 'UTF-8';        
        $mail->SMTPDebug = 0;                                     
        $mail->Host       = 'smtp.gmail.com;';                     
        $mail->SMTPAuth   = true;                              
        $mail->Username   = 'mobilebunkmail@gmail.com';                  
        $mail->Password   = 'password';                                                        
        $mail->Port       = 587;
        $mail->SMTPSecure = 'tls';
        $mail->wordwrap=50;      
        $mail->Subject = 'Application Acceptance'; 
        $mail->Body    = '<p style="font-size:1.5rem">Hello '.$firstname.'  '.$lastname.',</p><p style="font-size:1.2rem">You have been selected. We will contact you soon with more details.</p>'; 
        $mail->AltBody = 'Hello '.$firstname.'  '.$lastname.', You have been selected. We will contact you soon with more details.'; 
        $mail->setFrom('mobilebunkmail@gmail.com','Mobile Bunk & Services');            
        $mail->addAddress($email,$firstname); 
        $mail->addReplyTo('mobilebunkmail@gmail.com');
        $mail->isHTML(true);                                
        if($mail->send())
        {
            $_SESSION['addemp']=$_SESSION['addemp']."Mail has been sent";
            header('Location:joinus.php');
        }
        else{
            $_SESSION['addemp']=$_SESSION['addemp']."Mail could not be sent";
        }
        
		header('Location:members.php');
	}
    }

?>

<!DOCTYPE html>
<html>
    <head>

        <title>Mobile Bunk & Services</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">   
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="addmember.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
            <a class="navbar-brand" href="admin.php">
                <img src="../IMG_20201116_000518.png" style="width: 60px;height: 28px;padding-right: 10px;" class="d-inline-block align-top" alt="" loading="lazy">
                Mobile Bunk & Services-Admin</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a class="nav-link" href="admin.php">Users</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="applications.php">Applications</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="orders.php">Orders</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="members.php">Members</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="query.php">Queries</a>
                </li>
              </ul>
              <span class="navbar-text" style="text-align: right;">
                <a href="../logout.php">Log out</a>
              </span>
            </div>
          </nav>

          <div class="container a">
              <div class="col-12">
                  <form action="addmember.php" method='POST'>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter Application ID*" name="appid" required/>
                    </div>
                    <input type="submit" class="btnRegister" id="apply" onclick="apply()" name="add" value="Add"/>
                                    
                  </form>
              </div>
          </div>

    </body>
</html>
