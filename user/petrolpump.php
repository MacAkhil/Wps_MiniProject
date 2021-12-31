<?php
        $name=$_POST['name'];
        $petrolpumpname=$_POST['petrolpumpname'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $state=$_POST['state'];
        $city=$_POST['city'];
        $msg=$_POST['msg'];

        $conn = new mysqli('localhost','root','','test');

        if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
        } 
        else {
		$stmt = $conn->prepare("insert into petrolpumps(name,pumpname,phone,email,state,city,message) values('$name','$petrolpumpname','$phone','$email','$state','$city','$msg')");
		$execval = $stmt->execute();
		echo $execval;
		echo "Message sent successfully...";
		$stmt->close();
		$conn->close();
	    }      

?>