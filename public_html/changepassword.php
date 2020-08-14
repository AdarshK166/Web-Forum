<?php

// Insert logic for sign up page
  session_start();
  if (isset($_SESSION['username'])&&$_SESSION['username']!=""){
    $username=$_SESSION['username'];
    $userid = $_SESSION['user_Id'];
  }
  else
  {
  }
include "db.php";
//empty fills check
if(empty($_POST['oldPassword']) || empty($_POST['newPassword']) )
            
        {
            
            echo '<script language="javascript">';
            echo 'alert("Please fill in all the fields")';
            echo '</script>';
            echo '<meta http-equiv="refresh" content="0;url=changePass.php" />';
        }else{


//paswords match check
$oldPass = $_POST['oldPassword'];
$oldPass1= md5($oldPass);
$newPass = $_POST['newPassword'];
$newPass1= md5($newPass);


$query = "SELECT password FROM tbl_user where username = '$username'";
$res = mysqli_query($con,$query);

if (mysqli_num_rows($res) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($res)) {
        $oldPass0=$row["password"];
    }
  } else {
    echo "$oldPass0";
  }

if($oldPass1 == $oldPass0){
    $query = "update tbl_user set password='$newPass1' where username ='$username' ";
    $res = mysqli_query($con,$query);
    echo '<script language="javascript">';
            echo 'alert("Password changed")';
            echo '</script>';
            echo '<meta http-equiv="refresh" content="0;url=index.php" />';
}
else{
            echo '<script language="javascript">';
            echo 'alert("Old password is incorrect")';
            echo '</script>';
            echo '<meta http-equiv="refresh" content="0;url=changePass.php" />';
}
        }
 ?>