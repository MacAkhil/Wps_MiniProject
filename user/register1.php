<?php
	
	session_start();

    $id = $_POST['id'];
    $email = $_POST['email'];
    $number= $_POST['number'];
	$password = $_POST['password'];
	$confirmpassword=$_POST['confirmpassword'];
	$gender = $_POST['gender'];
	
	if($password==$confirmpassword){

    $conn = mysqli_connect('localhost','root','','test');
     
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());        
    }
	else {
		$query="SELECT * from registration where id='$id'";
		$result=mysqli_query($conn,$query);
		if(mysqli_num_rows($result)==0){
			$_SESSION['userid']=$id;
			$_SESSION['email']=$email;
			$_SESSION['number']=$number;
			$_SESSION['password']=$password;
			$_SESSION['gender']=$gender;
			$_SESSION['auth']='true';
			$stmt = "insert into registration(id,email,number,password,gender) values('$id','$email',$number,'$password','$gender')";
			$execval = mysqli_query($conn,$stmt);
			mysqli_close($conn);
			header('Location:success.php');
		}
		else{
			$_SESSION['errormessage']="Username already exists. Please enter another.";
			header('Location:login.php');
		}
	}
	}
	else{
		$_SESSION['errormessage']="Passwords do not match.";
		header('Location:login.php');
	}

?>