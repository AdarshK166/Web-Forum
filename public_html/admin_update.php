
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/bootstrap/css/buttons.css" rel="stylesheet">
</head>
<?php
  include 'db.php';
  session_start();
$id=$_SESSION['id'];
$query=mysqli_query($con,"select * from tbl_admin where id='$id'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
  ?>


<body>
   <!-- Navigation -->
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
            <div class="container">
            <a class="navbar-brand" >Admin Page</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home
                    
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view_users.php">Users
                    <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view_userpost.php"> Posts </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="admin_logout.php">Log Out</a>
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
               <form action="#" method="post" >
                  

                  <div class="form-group">
                  <input type="text" name="first_name"  class="form-control my-input"  placeholder="First name" >
                  </div>

                  <div class="form-group">
                     <input type="text" name="last_name"  class="form-control my-input"  placeholder="Last name">
                  </div>

                  
                  <div class="form-group">
                     <input type="email" name="email"  class="form-control my-input"  placeholder="Email">
                  </div>

                 
                  <div class="form-group">
                     <input type="text" name="admin_name"  class="form-control my-input" placeholder="Adminname">
                  </div>
                  <div class="form-group">
                     <input type="password" name="admin_pass"  class="form-control my-input" placeholder="Password">
                  </div>
                  
                  <div class="text-center ">
                     <button type="submit" class="btn btn-info" name="submit" class="btn btn-info" > Save</button>
                     
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

      if(isset($_POST['submit'])){

        $first_name=$_POST['first_name'];
        $last_name=$_POST['last_name'];
        $email=$_POST['email'];
        $admin_name=$_POST['admin_name'];
        $admin_pass=$_POST['admin_pass']; 
        
        $query="UPDATE tbl_admin SET first_name='$first_name', 
        last_name='$last_name', email='$email', admin_name='$admin_name',
         admin_pass='$admin_pass'   WHERE id= '$id')";
        

/*
        $fullname = $_POST['fname'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $address = $_POST['address'];
      $query = "UPDATE users SET full_name = '$fullname',
                      gender = '$gender', age = $age, address = '$address'
                      WHERE user_id = '$id'";
                      */
                    $result = mysqli_query($con, $query) or die(mysqli_error($con));
                    ?>

                     
echo '<script language="javascript">';
                    echo 'alert("data updated")';
                    echo '</script>';
        <?php
             }
                           
?>  