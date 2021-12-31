<?php 
    session_start();
    if(isset($_POST['ordernow'])){
    
    $conn = new mysqli('localhost','root','','test');
    if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
    } 
    else {
    $userid= $_SESSION['userid'];
    $name=$_SESSION['name'];
    $address=$_SESSION['address'];
    $number=$_SESSION['contactnumber'];
    $fuel=$_SESSION['fuel'];
    $litres=$_SESSION['litres'];
    $amount=$_SESSION['amount'];
    $rewardamount=$_SESSION['rewardamount'];
		$stmt = $conn->prepare("insert into bookings(userid,name,address,number,fuel,litres,amount,date,time,reward) values('$userid','$name','$address',$number,'$fuel',$litres,$amount,NOW(),NOW(),$rewardamount)");
		//$stmt->bind_param("sssisiii", $_SESSION['userid'],$_SESSION['name'],$_SESSION['address'],$_SESSION['contactnumber'],$_SESSION['fuel'],$_SESSION['litres'],$_SESSION['amount'],$rewardamount);
    $execval = $stmt->execute();
    
		$stmt->close();
    $conn->close();
    header('Location:pay.php');
    }
  }  
  else if(isset($_POST['cancel'])){
    header('Location:fuel.php');
  } 
?>