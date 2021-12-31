<?php 
    session_start();
    if(isset($_POST['requestnow'])){
    
        $conn = new mysqli('localhost','root','','test');

    if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
    } 
    else {
		$stmt = $conn->prepare("insert into mechanic(userid,name,address,number,amount,2service,4service,date,time,orderdate,ordertime) values(?,?,?,?,?,?,?,?,?,NOW(),NOW())");
		$stmt->bind_param("sssiissss", $_SESSION['userid'],$_SESSION['name'],$_SESSION['address'],$_SESSION['contactnumber'],$_SESSION['amount'],$_SESSION['2service'],$_SESSION['4service'],$_SESSION['date'],$_SESSION['time']);
    $execval = $stmt->execute();
    
		$stmt->close();
    $conn->close();
    header('Location:pay1.php');
    }
  } 
  else if(isset($_POST['cancel'])){
    header('Location:mechanic.php');
  }  
?>
