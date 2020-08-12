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
      <a class="navbar-brand" href="#">Start Bootstrap</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">About</a>
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
                <li class="nav-item">
                <a class="nav-link" href="signin.php">Sign In</a>
                </li>';
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
               My Profile
            </h1>
         </div>
      </div>
      <div class="row">
         <div class="col-md-4 mx-auto">
            <div class="myform form ">
               <form action="index.php" method="post" name="signup">
                 
				 <?php 
				  if (isset($_SESSION['username'])&&$_SESSION['username']!=""){
              $username=$_SESSION['username'];
              $userid = $_SESSION['user_Id'];
            
				include 'db.php';
				
				
				$selectquery =" select *from tbl_user where username='$username'";
				$query = mysqli_query($con,$selectquery );
				$nums= mysqli_num_rows($query);
				
				while($res = mysqli_fetch_array($query))
				{
				
				?>
					
				<div class="card bg-light border-secondary my-4">
                     <h5 class="text-center">First Name:  <?php echo $res['fname']; ?></h5>
                  </div>
                  <div class="card bg-light border-secondary my-4">
                  <h5 class="text-center">Last name: <?php echo $res['lname']; ?></h5>
                  </div>
                  <div class="card bg-light border-secondary my-4">
                  <h5 class="text-center">Gender: <?php echo $res['gender']; ?></h5>
                  </div>
                  <div class="card bg-light border-secondary my-4">
                  <h5 class="text-center">Email: <?php echo $res['email']; ?></h5>
                  </div>
                  <div class="card bg-light border-secondary my-4">
                  <h5 class="text-center"> Username: <?php echo $res['username']; ?></h5>
                  </div>
		
				<?php
				}
				 }
				?>

                  <div class="text-center ">
                     <button class="btn btn-primary">go back</button>
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
