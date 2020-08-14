<?php
  session_start();
  if (isset($_SESSION['username'])&&$_SESSION['username']!=""){
    $username=$_SESSION['username'];
    $userid = $_SESSION['user_Id'];
  }
  else
  {
    header("Location:index.php");
  }
?>
<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="images/icon.png">
    <title>Add New Topic</title>
     
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
            <a class="nav-link" href="#">Home
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

    <div class="jumbotron">
        <div class="container">
            <h1 class="display-4">Create a new post</h1><br>
            <div class="container">

              
                  <form action="new.php" method="post" enctype="multipart/form-data">


                    <div class="form-group">
                      <label for="formGroupExampleInput">Enter Forum Heading</label>
                      <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter Forum Heading Here" name="question">
                    </div>
            
            <label>Select Category</label>
            <select class="form-control" name="select" id="select">
              <option value="1">Electronics</option>
              <option value="2">TV & Appliances</option>
              <option value="3">Men</option>
              <option value="4">Women</option>
              <option value="5">Baby & Kids</option>
              <option value="6">Home & Furniture</option>
              <option value="7">Sports, Books & More</option>
              <option value="8">Others</option>
            </select>
            <br>
            <div class="form-row">
                <div class="col">
                <label>Add image</label>
                 <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile01" name="uploadfile"  aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01" >Choose file</label>
            </div>
            </div>
                </div>
              </div>
              <br>

              <div class="form-group">
                  <label for="formGroupExampleInput1">Detailed Description</label>
                  <input type="text" class="form-control" id="formGroupExampleInput1" placeholder="Enter Forum Description" name="description">
              </div>

              <button type="submit" name="submit" class="btn btn-secondary btn-lg btn-block">+ Add Forum</button>
              
            
          </form>

        </div>
        </div>
    </div>
      
    
      
    
      
 <!-- Bootstrap core JavaScript -->
 <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
  </html>


<?php

       if(isset($_POST['submit'])){
           
    $msg = ""; 
    $qu = $_POST['question'];
    $se = $_POST['select'];
    //$au = addslashes(file_get_contents($_FILES["image"]["tmp_name"])); 
    $em = $_SESSION['username'];
    $de = $_POST['description'];
    $filename = $_FILES["uploadfile"]["name"]; 
    $tempname = $_FILES["uploadfile"]["tmp_name"];     
    $folder = "img/".$filename; 

    
           
           if($qu=='' || $se=='' || $em=='' || $de==''){
               echo "<script>alert('Please Enter all the Fields')</script>";
           }
           else{

    //   $con = mysqli_connect("","","");
    //  mysqli_select_db($con,"");
    include "db.php";
           
date_default_timezone_set('Asia/Kolkata');                                          //TIME

$timestamp = time();
$date_time = date("d-m-Y (D) H:i:s", $timestamp);
           
           
    $insert_query = "insert into tbl_post (post_title, post_content, cat_id, user_name, post_time, post_image) values ('$qu','$de','$se','$em','$date_time','$filename')";

$res=mysqli_query($con, $insert_query);
if (move_uploaded_file($tempname, $folder))  { 
  $msg = "Image uploaded successfully"; 
  echo "$msg";
}else{ 
  $msg = "Failed to upload image"; 
  echo "$msg";
} 
 
               
               echo "<script>alert('Your Forum has been successfully added')</script>";
               header("Location:index.php");
           
           }
           
       }
           
    ?>