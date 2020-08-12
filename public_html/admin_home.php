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
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin </title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <script>
function changeCat(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","getposts.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="#">Admin Page</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="view_users.php">Users
              
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="view_userpost.php">Posts</a>
          </li>
          <!--
          <li class="nav-item">
            <a class="nav-link" href="admin_logout.php">Log Out</a>
          </li>
          -->
          <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <?php echo $username;?></a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="admin_profile.php">Profile</a>
        <a class="dropdown-item" href="admin_logout.php">Log Out</a>
        </div>
      </li>
           
          
          
        </ul>
      </div>
    </div>
  </nav>
</br>
</br>
        <!-- Page Content -->
</br>
</br>
</br>
        <div class="text-center">
    <h1 align="center">Welcome Admin!</h1>
    </div>    

    

  

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
