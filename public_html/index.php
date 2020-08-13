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

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Web-Forum</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<script>
function changeCat(str,name) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
        document.getElementById("TopicName").innerHTML = "Category: "+name;
      }
    };
    xmlhttp.open("GET","getposts.php?q="+str,true);
    xmlhttp.send();
  }
}

</script>
<style>
button{
  border:none;
}
</style>
</head>

<body onload="changeCat(11,'All')">

  <!-- Navigation -->
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
                <li class="nav-item">
                <a class="nav-link" href="signin.php">Sign In</a>
                </li>';
              }
            ?>
 


        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="jumbotron">
      <div class="container">
        <h1 class="display-3" id="TopicName">Category :  All</h1>

        <nav class="navbar navbar-expand-sm navbar-light">
            <div class="navbar-nav">
              <button class="nav-item nav-link" value="All" onClick="changeCat(11,this.value)">All <span class="sr-only">(current)</span></button>
              <button class="nav-item nav-link" value="Electronics" onClick="changeCat(1,this.value)">Electronics</button>
              <button class="nav-item nav-link" value="TV & Appliances" onClick="changeCat(2,this.value)">TV & Appliances</button>
              <button class="nav-item nav-link" value="Men" onClick="changeCat(4,this.value)">Men</button>
              <button class="nav-item nav-link" value="Women" onClick="changeCat(5,this.value)">Women</button>
              <button class="nav-item nav-link" value="Baby & Kids" onClick="changeCat(6,this.value)">Baby & Kids</button>
              <button class="nav-item nav-link" value="Home & Furniture" onClick="changeCat(7,this.value)">Home & Furniture</button>
              <button class="nav-item nav-link" value="Sports" onClick="changeCat(8,this.value)">Sports</button>
              <button class="nav-item nav-link" value="Others" onClick="changeCat(9,this.value)">Others</button>
              <button class="nav-item nav-link" href="#"></button>
            </div>
        </nav>

        <div class="d-flex bd-highlight mb-3">
            <div class="p-2 bd-highlight"></div>
            <div class="p-2 bd-highlight">
                <a class="btn btn-primary btn-info" href="new.php" role="button">+ New Post</a>
            </div>
            <div class="ml-auto p-2 bd-highlight"></div>
          </div>

      </div>
    </div>

    <div class="container">
        
      <table class="table table-striped ">
        <thead>
          <tr>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Posts</th>
            <th scope="col">Date/Time</th>
          </tr>
        </thead>
        <tbody id="txtHint">
          </tbody>
      </table>
    </div>

      <br><br><br>
      <footer>
 <center>
  <h6 class="footer">Footer<h6>
  </center>
      </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
