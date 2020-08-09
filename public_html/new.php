<?php
  session_start();
  if (isset($_SESSION['username'])&&$_SESSION['username']!=""){
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
        <nav class="navbar navbar-light bg-light">
                <a class="navbar-brand" href="index.php">
                  <img src="images/icon.png" width="30" height="30" class="d-inline-block align-top" alt="">
                  E-Commerce Forum
                </a>
              </nav>

    <div class="jumbotron">
        <div class="container">
            <h1 class="display-4">Add a new Topic</h1><br>
            <div class="container">

              
                  <form action="new.php" method="post" enctype=”multipart/form-data>


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
      
    
      
    <footer>
 <center>
  <h6 class="footer">footer<h6>
  </center>
      </footer>
      
 <!-- Bootstrap core JavaScript -->
 <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>
  </html>


<?php

       if(isset($_POST['submit'])){
           

    $qu = $_POST['question'];
    $se = $_POST['select'];
    //$au = addslashes(file_get_contents($_FILES["image"]["tmp_name"])); 
    $em = $_SESSION['username'];
    $de = $_POST['description'];

    
           
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
           
           
    $insert_query = "insert into tbl_post (post_title, post_content, cat_id, user_name, post_time) values ('$qu','$de','$se','$em','$date_time')";

$res=mysqli_query($con, $insert_query);
               
               echo "<script>alert('Your Forum has been successfully added')</script>";
               header("Location:index.php");
           
           }
           
       }
           
    ?>