<?php
  session_start();
  unset($_SESSION['lfile']);
  unset($_SESSION['rfile']);
?>

<!Doctype html>
<html>
<head>

<title>Mobile Bunk & Services</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">   
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="applications.css">
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
              <a class="nav-link active" href="#">Applications</a>
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

    <div id="users" class="container">
    <h4>APPLICATIONS</h4><br>
        <div class="a">
        <h5>EMPLOYEE</h5><br>
        <?php 
            $conn = mysqli_connect('localhost','root','','test');
     
            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());        
            }
            else 
            {        
                $query="SELECT * from employee ";
                $result=mysqli_query($conn,$query);
                ?>
                <table>
                        <th>
                            <td class="head">ID</td>
                            <td class="head">FIRSTNAME</td>
                            <td class="head">LASTNAME</td>
                            <td class="head">MOBILE</td>
                            <td class="head">EMAIL</td>
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
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['email']; ?></td>
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

    <div id="petrol" class="container">
        <div class="a">
        <h5>PETROL PUMPS</h5><br>
        <?php 
            $conn = mysqli_connect('localhost','root','','test');
     
            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());        
            }
            else 
            {        
                $query="SELECT * from petrolpumps ";
                $result=mysqli_query($conn,$query);
                ?>
                <table>
                        <th>
                            <td class="head">ID</td>
                            <td class="head">NAME</td>
                            <td class="head">PETROL PUMP NAME</td>
                            <td class="head">EMAIL</td>
                            <td class="head">MOBILE</td>
                            <td class="head">STATE</td>
                            <td class="head">CITY</td>
                            <td class="head">MESSAGE</td>
                        </th>
                <?php
                while($row=mysqli_fetch_array($result))
                {
                    ?>
                        <tr>
                            <td><?php echo " " ?></td>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['pumpname']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['state']; ?></td>
                            <td><?php echo $row['city']; ?></td>
                            <td><?php echo $row['message']; ?></td>
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