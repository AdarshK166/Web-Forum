<?php
  session_start();
  if (isset($_SESSION['username'])&&$_SESSION['username']!=""){
    $username=$_SESSION['username'];
    $userid = $_SESSION['user_Id'];
  }
  else
  {
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Web-Forum</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


<style>
button{
  border:none;
}
</style>
</head>

<body onload="changeCat(11,'All')">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
    <a class="navbar-brand" href="index.php"><img src="img/logo/agora.png" alt="logo" style="width:80px"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
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
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sign In</a>
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

  <!-- Page Content -->
   <div class="container">
      <div class>
         <div class="header-title">
            <h1 class="wv-heading--title"><br>
              About
            </h1><br>
			The WEBFORUM is a discussion forum that gives information about  Electronics , TV & appliances ,men , women , baby &kid , home & furniture , sports related question etc.
			<br><br>
		 This forum is useful for the beginners to get information related to various topic. There is a centralized database in which all the information is managed. The administrator acts as highest authority and has right to update, delete ,and edit the database. The user has to create the account to access the data. Once the user has created the account in the database he/she become the connected user. When some other user asks the questions these connected user if knows the answers can reply the answers it. The user who logged in can select the questions according to the category. The administrator can insert new topic dynamically. The connected user while logged in can exchange messages with each other. When the user asks the question related to any topic all the related question and answers will be displayed. This site also gives number of times the question is viewed and number of times the question is answered. This site also gives us information who had asked the question and which users has replied to those question
		</div><br><br>
     
		 <div class="card-header bg-dark text-white text-center" >
		Contact Information   <br>   mobile number: &nbsp;12345678    &nbsp;&nbsp;&nbsp; &nbsp;    email: &nbsp;xyz@gmail.com   &nbsp;&nbsp;&nbsp; &nbsp; Address:&nbsp;Mapusa goa.
      </div>
   </div>
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
