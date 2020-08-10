<?php

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
               <form action="profileupdate.php" method="post" name="signup">
                 
				 <?php 
				session_start();
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
					
				<div class="form-group">
				
                     first name:
					  <input type="text" name="fname"  class="form-control my-input" id="fname" placeholder="first name *"  value="<?php echo $res['fname']; ?>"required>
                  </div>
                  <div class="form-group">
					Last name: 
					  <input type="text" name="lname"  class="form-control my-input" id="lname" placeholder="lastname *"  value="<?php echo $res['lname']; ?>"required>
                  </div>
                  <div class="form-group">
					Gender: 
					  <input type="text" name="gender"  class="form-control my-input" id="gender" placeholder="gender *"  value="<?php echo $res['gender']; ?>"required>
                  </div>
                  <div class="form-group">
                    Email:
					  <input type="email" name="gender"  class="form-control my-input" id="email" placeholder="email *"  value="<?php echo $res['email']; ?>"required>
                  </div>
                  <div class="form-group">
                    Username: 
					 <input type="text" name="username"  class="form-control my-input" id="username" placeholder="username *"  value="<?php echo $res['username']; ?>"required>
                  </div>
                  <div class="form-group">
                    Password: 
					  <input type="password" name="password"  class="form-control my-input" id="password" placeholder="password *"  value="<?php echo $res['password']; ?>"required>
                  </div>	
					
					
				<?php
				}
				 }
				?>
				 
				<div class="text-center ">
                     <button >save</button>
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