<?php 

    // Insert logic for sign in page
    session_start();
    
    include 'db.php';

    
    if(empty($_POST['username']) || empty($_POST['password']) )
        {
            echo '<script language="javascript">';
            echo 'alert("Empty fields")';
            echo '</script>';
            echo '<meta http-equiv="refresh" content="0;url=signin.php" />';
        }
     else
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $pwd = md5($password);

        $username = mysqli_real_escape_string($con,$_POST['username']);
        $password = mysqli_real_escape_string($con,$_POST['password']);
        
        echo " $username ";
        echo " $pwd ";
        echo " $password ";

        $query = "SELECT * FROM tbl_user WHERE username = '$username' AND password = '$pwd'";
        $result = mysqli_query($con, $query) or die ("Verification error");
        $array = mysqli_fetch_array($result);
        
        if ($array['username'] == $username){
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $pwd;
            $_SESSION['fname'] = $array['fname'];
            $_SESSION['lname'] = $array['lname'];
            $_SESSION['gender'] = $array['gender'];
            $_SESSION['email'] = $array['email'];
            $_SESSION['user_upvote'] = $array['user_upvote'];
            $_SESSION['user_downvote'] = $array['user_downvote'];
            $_SESSION['user_Id'] = $array['user_Id'];
            header("Location: home.php");
        }
        
        else{
            echo '<script language="javascript">';
            echo 'alert("Incorrect username or password")';
            echo '</script>';
            echo '<meta http-equiv="refresh" content="0;url=index.php" />';
        }
    }    
   
?>