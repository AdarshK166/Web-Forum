<?php

// Insert logic for sign up page

include "db.php";

  session_start();
    $username=$_SESSION['username'];
    $userid = $_SESSION['user_Id'];

extract($_POST);

	$fname = str_replace("'","`",$fname); 
	$fname = mysqli_real_escape_string($con, $fname);
	
	$lname = str_replace("'","`",$lname); 
    $lname = mysqli_real_escape_string($con,$lname); 
    
    // $gender = str_replace("'","`",$gender); 
    // $gender = mysqli_real_escape_string($con,$gender);
    
    $email = str_replace("'","`",$email); 
	$email = mysqli_real_escape_string($con,$email);
	        
	// $username = str_replace("'","`",$username); 
	// $username = mysqli_real_escape_string($con,$username); 

	// $password = str_replace("'","`",$password); 
	// $password = mysqli_real_escape_string($con,$password);
	// $password = md5($password);

    
//$sql = "INSERT INTO tbl_user (fname,lname,gender,email,username,password) VALUES ('$fname','$lname','$gender','$email','$username','$password')";

$updatequery = "update tbl_user set fname='$fname',lname='$lname',email='$email' where username ='$username' ";
$result = mysqli_query($con,$updatequery);
		
if($result)
 {
    echo '<script language="javascript">';
    echo 'alert("Successfully updated")';
    echo '</script>';
    // echo '<meta http-equiv="refresh" content="0;url=signin.php" />';
}
else{
    echo '<script language="javascript">';
    echo 'alert("Error")';
    echo '</script>';
    // echo '<meta http-equiv="refresh" content="0;url=index.php" />';                                
    }


?>