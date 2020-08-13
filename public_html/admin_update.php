<?php
  session_start();
  if (isset($_SESSION['admin_name'])&&$_SESSION['admin_name']!=""){
    $admin_name=$_SESSION['admin_name'];
    $id = $_SESSION['id'];
  }
  else
  {
  }

?>
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
   <!-- Navigation -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
            <div class="container">
            <a class="navbar-brand"><img src="img/logo/agora.png" alt="logo" style="width:80px"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home
                    
                    </a>
                </li>
                <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Manage Users</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="view_users.php">User List</a>
        <a class="dropdown-item" href="view_userpost.php">User Post</a>
        </div>
      </li>
                
                <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               <?php echo $admin_name;?></a>
               <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="admin_profile.php">Profile</a>
               <a class="dropdown-item" href="admin_logout.php">Log Out</a>
               </div>
               </li>
                
                
                </ul>
            </div>
            </div>
        </nav>

   <div class="container">
      <div class="col-md-6 mx-auto text-center">
         <div class="header-title">
            <h1 class="wv-heading--title">
               Update Profile
            </h1>
         </div>
      </div>
      <div class="row">
         <div class="col-md-4 mx-auto">
            <div class="myform form ">
               <form action="admin_updateconf.php" method="post" name="signup" >
                  

                  <?php 

                  if (isset($_SESSION['admin_name'])&&$_SESSION['admin_name']!=""){
                  $admin_name=$_SESSION['admin_name'];
                  $id = $_SESSION['id'];

                  include 'db.php';


                  $selectquery =" select * from tbl_admin where admin_name='$admin_name'";
                  $query = mysqli_query($con,$selectquery );
                  $nums= mysqli_num_rows($query);

                  while($res = mysqli_fetch_array($query))
                  {

                  ?>
   
                  <div class="form-group">
                  <br>
                     <p>First name:</p>   
                     <input type="text" name="first_name"  class="form-control my-input" id="first_name" placeholder="first name *"  value="<?php echo $res['first_name']; ?>"required>
                     </div>
                     <div class="form-group">
                     <p>Last name: </p> 
                     <input type="text" name="last_name"  class="form-control my-input" id="last_name" placeholder="last name *"  value="<?php echo $res['last_name']; ?>"required>
                     </div>
                     <div class="form-group">
                     <p>Gender: </p> 
                     <input type="text" name="gender"  class="form-control my-input" id="gender" placeholder="gender *"  value="<?php echo $res['gender']; ?>"required>
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
                     <button type="submit" class="btn btn-info">Save</button>
                     <a href="admin_profile.php"  class="btn btn-info" role="button">Go Back</a>
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

