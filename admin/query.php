<?php 

use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
  
require '../vendor/autoload.php'; 
session_start();
if(isset($_SESSION['query'])){
  echo "<script type='text/javascript'>
          alert('" . $_SESSION['query'] . "');
        </script>";
  unset($_SESSION['query']);
}
  if(isset($_POST['send'])){
    $email=$_POST['email'];
    $msg=$_POST['msg'];
    $id=$_POST['id'];

    $conn = mysqli_connect('localhost','root','','test');
     
        if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());        
        }
	    else {
        $query2="select comment from contactus where id='$id'";
        $result2=mysqli_query($conn,$query2);
        $row=mysqli_fetch_array($result2);
	    }

  $mail = new PHPMailer(true);                                        
        $mail->isSMTP(); 
        $mail->CharSet = 'UTF-8';        
        $mail->SMTPDebug = 0;                                     
        $mail->Host       = 'smtp.gmail.com;';                     
        $mail->SMTPAuth   = true;                              
        $mail->Username   = 'mobilebunk.services@gmail.com';                  
        $mail->Password   = 'Mobilebunk@123';                                                        
        $mail->Port       = 587;
        $mail->SMTPSecure = 'tls';
        $mail->wordwrap=50;      
        $mail->Subject = 'Reply to your query'; 
        $mail->Body    = '<p style="font-size:1.5rem">Reply to:'.$row['comment'].'<br></p><p style="font-size:1.2rem">Hello, <br>'.$msg.'</p>'; 
        $mail->AltBody = 'Hello,'.$row['comment']; 
        $mail->setFrom('mobilebunk.services@gmail.com','Mobile Bunk & Services');            
        $mail->addAddress($email,$firstname); 
        $mail->addReplyTo('mobilebunk.services@gmail.com');
        $mail->isHTML(true);                                
        if($mail->send())
        {
            $_SESSION['query']="Mail has been sent";
            $query="UPDATE contactus set answered='yes' where id='$id'";
            $result=mysqli_query($conn,$query);
            header('Location:query.php');
        }
        else{
            $_SESSION['query']="Mail could not be sent";
        }
      }
?>



<!Doctype html>
<html>
<head>

<title>Mobile Bunk & Services</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">   
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="admin.css">
  <style>
    form{
      margin:60px 0px;
      padding:20px;
    }
    input{
      margin:10px;
      padding:10px;
    }
    #send{
      background-color: rgb(60, 54, 146);
    border-radius: 15px;
    margin-left:20px;
    padding:10px 20px;
    color:white;
    border:none;
    }
    </style>
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
              <a class="nav-link active" href="query.php">Queries</a>
            </li>
          </ul>
          <span class="navbar-text" style="text-align: right;">
            <a href="../logout.php">Log out</a>
          </span>
        </div>
      </nav>

      <div id="users" class="container">
        <div class="row">
          <div class="col-7">
        <h4>QUERIES</h4><br>
        <div class="a">
        <?php 
            $conn = mysqli_connect('localhost','root','','test');
     
            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());        
            }
            else 
            {        
                $query="SELECT * from contactus ";
                $result=mysqli_query($conn,$query);
                ?>
                <table>
                        <th>
                            <td class="head">ID</td>
                            <td class="head">NAME</td>
                            <td class="head">EMAIL</td>
                            <td class="head">MOBILE</td>
                            <td class="head">COMMENT</td>
                            <td class="head">ANSWERED</td>
                        </th>
                <?php
                while($row=mysqli_fetch_array($result))
                {
                    ?>
                        <tr>
                            <td><?php echo " " ?></td>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['mobile']; ?></td>
                            <td><?php echo $row['comment']; ?></td>
                            <td><?php echo $row['answered']; ?></td>
                        </tr>
                    <?php
                }
                ?> </table>
                <?php
            }
            mysqli_close($conn);
        
        ?>
        </div>
        </div>
        <div class="col-5">
          <form action="query.php" method="POST">
            <input type="text" class="form-control" placeholder="ID *" name="id" required/>
            <input type="email" class="form-control" placeholder="Email *" name="email" required/>
            <input type="text" class="form-control" placeholder="Message *" name="msg" style="height: 100px;" required/>
            <input type="submit" class="btnRegister"  id="send" name="send" value="Send"/>
          </form>
        </div>
        </div>
    </div>

</body>
</html>