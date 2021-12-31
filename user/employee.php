<?php

session_start();
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception; 
  
require 'vendor/autoload.php'; 

    if(isset($_POST['apply']) && !empty($_FILES['license']['name']) && !empty($_FILES['resume']['name']))
    {

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["license"]["name"]);
    //$uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $target_file2= $target_dir . basename($_FILES["resume"]["name"]);
    $imageFileType2 = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $firstname=$_POST['empfirstname'];
    $lastname=$_POST['emplastname'];
    $email=$_POST['empemail'];
    $phone=$_POST['empphone'];

    if (move_uploaded_file($_FILES["license"]["tmp_name"], $target_file) && move_uploaded_file($_FILES["resume"]["tmp_name"], $target_file2)) {

        $f1=$_FILES["license"]["name"];
        $f2=$_FILES["resume"]["name"];
        $conn = new mysqli('localhost','root','','test');

        if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
        } 
        else {
		$stmt = $conn->prepare("insert into employee(firstname,lastname,phone,email,license,resume) values('$firstname','$lastname','$phone','$email','$f1','$f2')");
		$execval = $stmt->execute();
		echo $execval;
		$stmt->close();
        $conn->close();
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
            $mail->Subject = 'Application for employee at Mobile Bunk & Services'; 
            $mail->Body    = '<p style="font-size:1.5rem">Hello '.$firstname.'  '.$lastname.',</p><p style="font-size:1.2rem">Your application has been received by us. Stay tuned for futher instructions.</p>'; 
            $mail->AltBody = 'Hello '.$firstname.'  '.$lastname.', Your application has been received by us. Stay tuned for futher instructions.'; 
            $mail->setFrom('mobilebunkmail@gmail.com','Mobile Bunk & Services');            
            $mail->addAddress($email,$firstname); 
            $mail->addReplyTo('mobilebunkmail@gmail.com');
            $mail->isHTML(true);                                
            if($mail->send())
            {
                $_SESSION['msg']="Your application has been sent. Please check your mail for comfirmation";
                header('Location:joinus.php');
            }
            else{
                $_SESSION['msg']= "Mail could not be sent";
            }
	    }        
    } 
    else {
        echo "Sorry, there was an error uploading your file.";
    }
    }
?>
