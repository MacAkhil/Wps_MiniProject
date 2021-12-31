<?php
if($_POST)
{
    session_start();
    $userid=$_POST['userid'];
    $password=$_POST['password'];
       
    $conn = mysqli_connect('localhost','root','','test');
     
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());        
    }
    else 
    {        
        if($userid==='admin' && $password==='Admin@123'){
            header('Location:admin/admin.php');
        }
        else{
        $query="SELECT * from registration where id='$userid' and password='$password' ";
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)==1){
            $row=mysqli_fetch_array($result);
            $_SESSION['auth']='true';
            $_SESSION['userid']=$userid;
            $_SESSION['email']=$row['email'];
            $_SESSION['number']=$row['number'];
            $_SESSION['password']=$password;
            $_SESSION['gender']=$row['gender'];
            header('location:success.php');
        }
        else{
            $_SESSION['errormessage']="Invalid Username or Password";
            header('location:login.php');
        }
        }
    }
    mysqli_close($conn);
}
?>