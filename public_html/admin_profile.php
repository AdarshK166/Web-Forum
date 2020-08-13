<?php
  session_start();
  if (isset($_SESSION['admin_name'])&&$_SESSION['admin_name']!=""){
  }
  else
  {
    header("Location:admin_login.php");
  }
$username=$_SESSION['admin_name'];

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

    <!-- profile view-->
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
            <form action="#" method="post" >
                 
				 <?php 
				
				  if (isset($_SESSION['admin_name'])&&$_SESSION['admin_name']!=""){
              $admin_name=$_SESSION['admin_name'];
              
            
				include 'db.php';
				
				
				$selectquery =" select *from tbl_admin where admin_name='$admin_name'";
				$query = mysqli_query($con,$selectquery );
				$nums= mysqli_num_rows($query);
				
				while($res = mysqli_fetch_array($query))
				{
                    $id=$nums[0];
				?>

            <div class="table-responsive">		
                <!--
                    <div></span><div class="pull-right"><a href="edit_account.php">Edit Account</a></div> 
                -->
                <table class="table table-boredered">

                <tr>	
                <th>Name</th>
				<td><?php echo $res['first_name']." ".$res['last_name']; ?></td>
			    </tr>

			    <tr>
				<th>Email</th>
				<td><?php echo $res['email']; ?></td>
			    </tr>

                <tr>
                <th>Username</th>
                <td><?php echo $res['admin_name'] ?></td>
                        
                </tr>
                   
                <tr>
                <th>Password</th>
                <td>**********</td>
                </tr>
                
			    <tr>
				<th>Gender</th>
				<td><?php echo $res['gender']; ?></td>
                 </tr>
                
					</table>
	        </div>
				
            <div class="text-center ">
				<a href="admin_update.php"  class="btn btn-info" role="button">edit</a>
                 </div>	
				<?php
                }
            }
				 
				?>
                
                  
                  
               </form>
            </div>
         </div>
      </div>
   </div>
   <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>