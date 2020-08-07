<?php
	include 'db.php';
	session_start();
	if($_POST['type']==1){
		$fname=$_POST['fname'];
		$lname=$_POST['lname'];
		$gender=$_POST['gender'];
		$email=$_POST['email'];
        $username=$_POST['username'];
        $password=$_POST['password'];
		
		$duplicate=mysqli_query($con,"select * from tbl_user where email='$email'");
		if (mysqli_num_rows($duplicate)>0)
		{
			echo json_encode(array("statusCode"=>201));
		}
		else{
			$sql = "INSERT INTO tbl_user (fname,lname,gender,email,username,password) VALUES ('$fname','$lname','$gender','$email','$username','$password')";
			if (mysqli_query($con, $sql)) {
				echo json_encode(array("statusCode"=>200));
			} 
			else {
				echo json_encode(array("statusCode"=>201));
			}
		}
		mysqli_close($con);
	}
	if($_POST['type']==2){
		$email=$_POST['email'];
		$password=$_POST['password'];
		$check=mysqli_query($con,"select * from tbl_user where email='$email' and password='$password'");
		if (mysqli_num_rows($check)>0)
		{
			$_SESSION['email']=$email;
			echo json_encode(array("statusCode"=>200));
		}
		else{
			echo json_encode(array("statusCode"=>201));
		}
		mysqli_close($con);
	}
?>