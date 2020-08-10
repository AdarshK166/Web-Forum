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
               My Profile
            </h1>
         </div>
      </div>
      <div class="row">
         <div class="col-md-4 mx-auto">
            <div class="myform form ">
               <form action="index.php" method="post" name="signup">
                 
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
                     first name:<?php echo $res['fname']; ?>
                  </div>
                  <div class="form-group">
					Last name: <?php echo $res['lname']; ?>
                  </div>
                  <div class="form-group">
					Gender: <?php echo $res['gender']; ?>
                  </div>
                  <div class="form-group">
                    Email: <?php echo $res['email']; ?>
                  </div>
                  <div class="form-group">
                    Username: <?php echo $res['username']; ?>
                  </div>
                  <div class="form-group">
                    Password: <?php echo $res['password']; ?>
                  </div>	
					
					
				<?php
				}
				 }
				?>
				 
				  
                  
                  <div class="text-center ">
                     <button >go back</button>
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
