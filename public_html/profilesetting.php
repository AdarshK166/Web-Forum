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
    <a class="navbar-brand" href="index.php"><img src="img/logo/agora.png" alt="logo" style="width:80px"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home
              <span class="sr-only"></span>
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
               Change Personal Details
            </h1>
         </div>
      </div>
      <div class="row">
         <div class="col-md-4 mx-auto">
            <div class="myform form ">
               <form action="profileupdate.php" method="post" name="signup">
                 
				 <?php 

				  if (isset($_SESSION['username'])&&$_SESSION['username']!=""){
              $username=$_SESSION['username'];
              $userid = $_SESSION['user_Id'];
            
				include 'db.php';
				
				
				$selectquery =" select * from tbl_user where username='$username'";
				$query = mysqli_query($con,$selectquery );
				$nums= mysqli_num_rows($query);
				
				while($res = mysqli_fetch_array($query))
				{
				
				?>
					
				<div class="form-group">
            <br>
                  <p>First name:</p>   
					  <input type="text" name="fname"  class="form-control my-input" id="fname" placeholder="first name *"  value="<?php echo $res['fname']; ?>"required>
                  </div>
                  <div class="form-group">
					<p>Last name: </p> 
					  <input type="text" name="lname"  class="form-control my-input" id="lname" placeholder="lastname *"  value="<?php echo $res['lname']; ?>"required>
                  </div>
                  <div class="form-group">
                  <p>Email:</p>  
					  <input type="email" name="email"  class="form-control my-input" id="email" placeholder="email *"  value="<?php echo $res['email']; ?>"required>
                  </div>
                  <br>

				<?php
				}
				 }
				?>
				 
				<div class="text-center ">
                     <div class="text-center ">
                     <button type="submit" class="btn btn-info">Update Details</button>
                     <button type="button" onClick="window.location.href='index.php'" class=" btn btn-primary">Go Back</button>
                     <div><br></div>
                     <button type="button" onClick="window.location.href='changePass.php'" class=" btn btn-primary">Change Password</button>
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