<?php
  session_start();
  if (isset($_SESSION['admin_name'])&&$_SESSION['admin_name']!=""){
  }
              
$admin_name=$_SESSION['admin_name'];
            
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>admin</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
 <!-- Navigation -->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
    <a class="navbar-brand" href="admin_home.php"><img src="img/logo/agora.png" alt="logo" style="width:80px"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">

        <li class="nav-item">
            <a class="nav-link" href="admin_home.php">Home
             
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

  <div class="table-scrol">
    <h1 align="center">View Post</h1>
    </br>
    
    
        

    <table class="table table-bordered table-hover table-striped" style="table-layout: auto">
        <thead>

        <tr>

            <th>Id</th>
            <th>Title</th>
            <th>Content name</th>
            <th>Image</th>
            <th>Time</th>
            <th>Category</th>
            <th>Username</th>
            <th>Delete Post</th>
        </tr>
        </thead>

        <?php
        include("db.php");
        $view_post_query="SELECT * FROM tbl_post";//select query for viewing users.
        $run=mysqli_query($con,$view_post_query);//here run the sql query.

        

        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
        {
            $post_id=$row[0];
            $post_title=$row[1];
            $post_content=$row[2];
            $post_image=$row[3];
            $post_time=$row[4];
            $cat_id=$row[5];
            $user_name=$row[6];
            


        ?>

        <tr>
<!--here showing results in the table -->
            <td><?php echo $post_id;  ?></td>
            <td><?php echo $post_title;  ?></td>
            <td><?php echo  $post_content;  ?></td>
            <td><?php echo $post_image;  ?></td>
            <td><?php echo  $post_time;  ?></td>
            <td><?php echo  $cat_id;  ?></td>
            <td><?php echo  $user_name;  ?></td>
           <td><a href="delete_upost.php?del=<?php echo $post_id ?>"><button class="btn btn-danger">Delete</button></a></td> <!--btn btn-danger is a bootstrap button to show danger-->
        
        </tr>

        <?php } ?>

    </table>
        </div>
</div>

<script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>
