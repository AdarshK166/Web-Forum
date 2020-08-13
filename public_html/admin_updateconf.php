<?php

// Insert logic for sign up page

include "db.php";

  session_start();
    $admin_name=$_SESSION['admin_name'];
    $id = $_SESSION['id'];

extract($_POST);

	$first_name = str_replace("'","`",$first_name); 
	$irst_fname = mysqli_real_escape_string($con, $first_name);
	
	$last_name = str_replace("'","`",$last_name); 
    $last_name = mysqli_real_escape_string($con,$last_name); 

    $gender = str_replace("'","`",$gender); 
    $gender = mysqli_real_escape_string($con,$gender);
    
    $email = str_replace("'","`",$email); 
	$email = mysqli_real_escape_string($con,$email);
	        
	

    

$updatequery = "update tbl_admin set first_name='$first_name',last_name='$last_name',gender='$gender',email='$email' where admin_name ='$admin_name' ";
$result = mysqli_query($con,$updatequery);
		
if($result)
 {
    echo '<script language="javascript">';
    echo 'alert("Successfully updated")';
    header("Location: admin_profile.php");
    echo '</script>';
    
}
else{
    echo '<script language="javascript">';
    echo 'alert("Error")';
    echo '</script>';
    
    }


?>