<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Bare - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="table-scrol">
    <h1 align="center">All the Users</h1>

<div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->

    <table class="table table-bordered table-hover table-striped" style="table-layout: auto">
        <thead>
        <tr>

            <th>User Id</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Username</th>
            <th>User Pass</th>
            <th>Delete User</th>
        </tr>
        </thead>

        <?php
        include("db.php");
        $view_users_query="SELECT * FROM tbl_user";//select query for viewing users.
        $run=mysqli_query($con,$view_users_query);//here run the sql query.

        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.
        {
            $user_id=$row[0];
            $fname=$row[1];
            $lname=$row[2];
            $gender=$row[3];
            $email=$row[4];
            $username=$row[5];
            $password=$row[6];
           



        ?>

        <tr>
<!--here showing results in the table -->
            <td><?php echo $user_id;  ?></td>
            <td><?php echo $fname;  ?></td>
            <td><?php echo $lname;  ?></td>
            <td><?php echo  $gender;  ?></td>
            <td><?php echo  $email;  ?></td>
            <td><?php echo  $username;  ?></td>
            <td><?php echo  $password;  ?></td>
           <td><a href="delete_user.php?del=<?php echo $user_id ?>"><button class="btn btn-danger">Delete</button></a></td> <!--btn btn-danger is a bootstrap button to show danger-->
        
        </tr>

        <?php } ?>

    </table>
        </div>
</div>

<script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


</body>

</html>
