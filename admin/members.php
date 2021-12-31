<?php 
  session_start();
  if(isset($_SESSION['addemp'])){
    echo "<script type='text/javascript'>
            alert('" . $_SESSION['addemp'] . "');
          </script>";
    unset($_SESSION['addemp']);
  }
  if(isset($_SESSION['delemp'])){
    echo "<script type='text/javascript'>
            alert('" . $_SESSION['delemp'] . "');
          </script>";
    unset($_SESSION['delemp']);
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
    .button{
    background-color: rgb(60, 54, 146);
    border-radius: 15px;
    margin-left:20px;
    padding:10px 20px;
    color:white;
    border:none;}
    .button:hover{
      text-decoration:none;
      color:white;
      background-color: rgba(60, 54, 146,0.7);
    }
    table a{
    text-decoration:none;
    color:black;
}
table a:hover,a:active,a:focus{
    text-decoration: underline;
    text-decoration-color: rgb(60, 54, 146);
    color: rgb(60, 54, 146);
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
              <a class="nav-link active" href="members.php">Members</a>
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

      <div class="container" style="margin-top:150px;">
        <div class="row">
        <div class="col-3 offset-6">
          <a href="addmember.php" class="button">Add Member</a>
        </div>
        <div class="col-3">
          <a href="delmember.php" class="button">Delete Member</a>
        </div>
        </div>
      </div>

    <div id="users" class="container">
    <h4>MEMBERS</h4><br>
        <div class="a">
        <?php 
            $conn = mysqli_connect('localhost','root','','test');
     
            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());        
            }
            else 
            {        
                $query="SELECT * from members ";
                $result=mysqli_query($conn,$query);
                ?>
                <table>
                        <th>
                            <td class="head">ID</td>
                            <td class="head">FIRST NAME</td>
                            <td class="head">LAST NAME</td>
                            <td class="head">EMAIL</td>
                            <td class="head">MOBILE</td>
                            <td class="head">LICENSE</td>
                            <td class="head">RESUME</td>
                        </th>
                <?php
                while($row=mysqli_fetch_array($result))
                {
                  $_SESSION['lfile']=$row['license'];
                  $_SESSION['rfile']=$row['resume'];
                    ?>
                        <tr>
                            <td><?php echo " " ?></td>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['firstname']; ?></td>
                            <td><?php echo $row['lastname']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><a href="licensefile.php" target="_blank"><?php echo $row['license']; ?></a></td>
                            <td><a href="resumefile.php" target="_blank"><?php echo $row['resume']; ?></a></td>
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

</body>
</html>