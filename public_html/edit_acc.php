<?php
    
    include("db.php");
    include("admin_profile.php");
    
    
  //if (isset($_SESSION['admin_name'])&&$_SESSION['admin_name']!=""){
    //$admin_name=$_SESSION['admin_name'];
    
    $id=$_GET['del'];
		
		$selectqueryy ="SELECT first_name, last_name, email, gender, admin_name, admin_pass FROM tbl_admin WHERE id =$id";
        //$selectqueryy->execute(array(':id'=>$id));
        $queryy = mysqli_query($con,$selectqueryy );
		//$edit_row = $selectqueryy->fetch(PDO::FETCH_ASSOC);
        //extract($edit_row);
        
        $edit_rows= mysqli_num_rows($query);
	/*			
				while($res = mysqli_fetch_array($queryy))
				{
                
				?>
	}
	else
	{
        echo 'alert("error!")';
        //header("Location: index.php");
	}
    */
	if(isset($_POST['btn_save_updates']))
	{
		$first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];	
        	
		
		if(!isset($errMSG))
		{
			$stmt = $con->prepare('UPDATE users SET first_name=:first_name, last_name=:last_name, email=:email,gender=:gender,admin_name=:admin_name, admin_pass=:admin_pass   WHERE id=:id');
			$stmt->bindParam(':first_nam',$first_nam);
			$stmt->bindParam(':last_name',$last_name);
            $stmt->bindParam(':email',$email);
            $stmt->bindParam(':gender',$gender);
            $stmt->bindParam(':admin_name',$admin_name);
            $stmt->bindParam(':admin_pass',$admin_pass);
			$stmt->bindParam(':id',$id);
				
			if($stmt->execute()){
				?>
                <script>
				alert('Successfully Updated...');
				window.location.href='admin_profile.php';
				</script>
                <?php
			}
			else{
				$errMSG = "Sorry Could Not Be Updated!";
			}
		}			
	}
?>
<!DOCTYPE html>
<html>
<head>
<title>PHP/MySQL Add, Edit, Delete, With User Profile.</title>
<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/jquery-1.11.3-jquery.min.js"></script>
</head>
<body>

</body>
</html>