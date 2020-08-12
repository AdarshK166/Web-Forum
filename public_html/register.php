<?php

// Insert logic for sign up page

include "db.php";

//empty fills check
if(
        empty($_POST['fname']) ||
        empty($_POST['lname']) ||
        empty($_POST['gender']) ||
        empty($_POST['email']) ||
        empty($_POST['username']) ||
        empty($_POST['password'])  ||
        empty($_POST['cpassword'])
            
        )
        {
            
            echo '<script language="javascript">';
            echo 'alert("Please fill in all the fields")';
            echo '</script>';
            echo '<meta http-equiv="refresh" content="0;url=signup.php" />';
            
        }

//paswords match check
elseif( ($_POST['password']) !== ($_POST['cpassword']) )
        {
            # code...
             
            echo '<script language="javascript">';
            echo 'alert("Password and Confirm password should match!")';
            echo '</script>';
            echo '<meta http-equiv="refresh" content="0;url=signup.php" />';
            
        }

/*
//username and email checks
            $username = $_POST['username'];
            $email = $_POST['email'];

            $sqlq = "SELECT * FROM tbl_user where username = '$username' OR email= '$email'";
            $resultq = mysqli_query($con,$sqlq);

        if (!empty($resultq))
                    {
                        
                        echo '<script language="javascript">';
                        echo 'alert("user with username or email already exits")';
                        echo '</script>';
                        echo '<meta http-equiv="refresh" content="0;url=signup.php" />';
                       
                    }
*/



 else{      //add new user
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
                    echo '<meta http-equiv="refresh" content="0;url=signup.php" />';                                
                    }
    }

 ?>