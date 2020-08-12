<?php
session_start();


if(isset($_SESSION['admin_name'])){
	session_destroy();
	
    //echo"<script>location.href='admin_login.php'</script>";
    header("Location: admin_login.php");
   // echo '<meta http-equiv="refresh" content="0;url=admin_login.php" />';
    //header("Location: view_users.php");
}
else{
	echo '<script language="javascript">';
        echo 'alert("error")';
        echo '</script>';
}
?>