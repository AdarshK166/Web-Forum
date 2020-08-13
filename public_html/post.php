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
<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="images/icon.png">
    <title>E-Commerce Forum</title>
    
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
    <a class="navbar-brand"><img src="img/logo/agora.png" alt="logo" style="width:80px"></a>
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
        <br>
     <?php   
        
        include "db.php";
        
        $q = $_GET['id'];
        $insert_query = "select * from tbl_post where post_id=$q";
        $res=mysqli_query($con, $insert_query);
           $arr=mysqli_fetch_array($res);
        
        $qq=$arr['post_title'];
        $dd=$arr['post_content'];
        $aa=$arr['user_name'];
        $tt=$arr['post_time'];
        
        
            echo "<div class=\"list-group\">
                <div class=\"d-flex w-100 justify-content-between\">
                    <h5 class=\"display-4\">$qq</h5>
                        <small>$tt by <b>$aa</b></small>
                </div>
                <h5><p class=\"mb-1\">$dd</p></h5>
            </div><br><br>";
        
        $insert_query1 = "select * from comments where post_id=$q";
        $res1=mysqli_query($con, $insert_query1);
        
        if(mysqli_num_rows($res1)>0){
            
           while($row1=mysqli_fetch_assoc($res1)){
        

            echo "<div class=\"card bg-light border-secondary my-2\">
            <div class=\"card-body\">
            <div class=\"row no-gutters\">
            <div class=\"col-12 col-sm-6 col-md-8\">$row1[comment]</div>
            <div class=\"col-6 col-md-4\"><small>$row1[time] by <b>$row1[author]</b></small></div>
            </div>
            </div>
            </div>";
           }
           }
            else
            {
              echo "<div class=\"container\"><center>No Comments posted</center></div>";
            }
            ?>
          
  
            <!--Input Box--> 
            <br>
            
            <?php if (isset($_SESSION['username'])&&$_SESSION['username']!=""){ ?>
              <div class="card bg-light border-dark"><div class="card-body">

            <form action="#" method="post">

            <div class="input-group mb-3">
            <input type="text" name="comment" class="form-control" placeholder="Enter Comment" aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
            <button class="btn btn-outline-dark" type="submit" name="submit">Post Comment</button>
            </div>
            </div>
            </form>
            </div></div>
            <?php }else{ ?>
              <p>Please login to comment</p>
              <?php } ?>
  

      
            


                   
                
    </div>
      
      <br><br><br>
     <footer>
 <center>
  <h6 class="footer">footer<h6>
  </center>
      </footer>


    </body>
    </html>

      
      
      <?php
      
      
      
    if(isset($_POST['submit'])){
        
        
    $comment = $_POST['comment'];
    $author = $_SESSION['username'];
    
        
        if($comment=='' || $author==''){
               echo "<script>alert('Please Enter all the Fields')</script>";
           }
        else{
            
            date_default_timezone_set('Asia/Kolkata');                                          //TIME

            $timestamp = time();
            $date_time = date("d-m-Y (D) H:i:s", $timestamp);
            
                       $ins_query = "insert into comments (post_id, comment, author, time) values ('$q','$comment','$author','$date_time')";

                    $result=mysqli_query($con, $ins_query);
            
            echo "<script>window.location.href='post.php?id=$q'</script>";
            
        }
        
        
    }
      
      
      
      
      ?>



 