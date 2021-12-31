<?php
	
	session_start();

    $name = $_POST['name'];
    $email = $_POST['email'];
    $number= $_POST['number'];
	$comment = $_POST['comment'];
	
    $conn = new mysqli('localhost','root','','test');

    if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into contactus(name,email,mobile,comment) values('$name','$email',$number,'$comment')");
		$execval = $stmt->execute();
		$_SESSION['contact']='Your query has been sent. You will be answered to your email soon.';
		header('Location:contactus.php');
		$stmt->close();
		$conn->close();
	}
?>