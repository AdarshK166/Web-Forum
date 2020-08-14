<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/buttons.css" rel="stylesheet">
</head>
<body>
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
    <a class="navbar-brand" href="index.php"><img src="img/logo/agora.png" alt="logo" style="width:80px"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About</a>
          </li>
          <?php
              if (isset($_SESSION['username'])&&$_SESSION['username']!="")
              {
                echo '<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hello! '.$username.'</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="profile.php">Profile</a>
                  <a class="dropdown-item" href="profilesetting.php">Settings</a>
                  <!-- <div class="dropdown-divider"></div> -->
                  <a class="dropdown-item" href="logout.php">Log Out</a>
                </div>
              </li>';
              }
              else
              {
                echo '<li class="nav-item">
                <a class="nav-link" href="signup.php">Sign Up</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sign In</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="signin.php">User</a>
                  <a class="dropdown-item" href="admin_login.php">Admin</a>
                  <!-- <div class="dropdown-divider"></div> -->
                </div>
              </li>';
                // echo '<li class="nav-item">
                // <a class="nav-link" href="signup.php">Sign Up</a>
                // </li>
                
                // <li class="nav-item">
                // <a class="nav-link" href="signin.php">Sign In</a>
                // </li>
                // <li class="nav-item">
                // <a class="nav-link" href="admin_login.php">Admin login</a>
                // </li>
                // ';
              }
            ?>
 


        </ul>
      </div>
    </div>
  </nav>
   <div class="container">
      <div class="col-md-6 mx-auto text-center">
         <div class="header-title">
            <h1 class="wv-heading--title">
            Admin Login
            </h1>
         </div>
      </div>
      <div class="row">
         <div class="col-md-4 mx-auto">
            <div class="myform form ">
            <form action="#" method="post" >
                  <div class="form-group">
                     <input type="text" name="admin_name"  class="form-control my-input" id="admin_name" placeholder="Username">
                  </div>
                  <div class="form-group">
                     <input type="password" name="admin_pass"  class="form-control my-input" id="admin_pass" placeholder="Password">
                    </div>
                  <div class="text-center ">
                     <button type="submit" class=" btn btn-block send-button tx-tfm">Log In</button>
                  </div>
                  
                     </div>
                     </form>
            </div>
         </div>
      </div>
   </div>
   <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

<?php
session_start();
    
include 'db.php';
    if(empty($_POST['admin_name']) || empty($_POST['admin_pass']) )
    {
        echo '<script language="javascript">';
       
        echo '</script>';
        exit();
    }
    else
    {


        $admin_name=$_POST['admin_name'];
        $admin_pass=$_POST['admin_pass'];
    }
    //$admin_query="select * from admin where admin_name='$admin_name' AND admin_pass='$admin_pass'";

    //$run_query=mysqli_query($dbcon,$admin_query);

    $query = "select * from tbl_admin where admin_name='$admin_name' AND admin_pass='$admin_pass'";
    $result = mysqli_query($con, $query) or die ("Verification error");
    $array = mysqli_fetch_array($result);
    $_SESSION["id"]=$row['id'];



    if($array['admin_name'] == $admin_name)
    {
        $_SESSION['admin_name'] = $admin_name;
        
        //header("Location: view_users.php");
        header("Location: admin_home.php");
    }
    else {
        echo '<script language="javascript">';
        echo 'alert("Admin details are incorrect")';
        echo '</script>';
    }


?>



