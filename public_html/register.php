<?php
include "db.php";

extract($_POST);

	$fname = str_replace("'","`",$fname); 
	$fname = mysqli_real_escape_string($con, $fname);
	
	$lname = str_replace("'","`",$lname); 
    $lname = mysqli_real_escape_string($con,$lname); 
    
    $gender = str_replace("'","`",$gender); 
    $gender = mysqli_real_escape_string($con,$gender);
    
    $email = str_replace("'","`",$email); 
	$email = mysqli_real_escape_string($con,$email);
	        
	$username = str_replace("'","`",$username); 
	$username = mysqli_real_escape_string($con,$username); 

	$password = str_replace("'","`",$password); 
	$password = mysqli_real_escape_string($con,$password);
	$password = md5($password);

    
$sql = "INSERT INTO tbl_user (fname,lname,gender,email,username,password) VALUES ('$fname','$lname','$gender','$email','$username','$password')";
$result = mysqli_query($con,$sql);
		
if($result)
 {
    echo '<script language="javascript">';
    echo 'alert("Successfully Registered")';
    echo '</script>';
    echo '<meta http-equiv="refresh" content="0;url=signin.php" />';
}
else{
    echo '<script language="javascript">';
    echo 'alert("Error")';
    echo '</script>';
    echo '<meta http-equiv="refresh" content="0;url=index.php" />';                                
    }


?>