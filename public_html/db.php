<?php
// Establishes connection to database
$host = "localhost";
$user = "root";
$pwd  = "";
$db   = "webforum";

$con = mysqli_connect($host,$user,$pwd,$db);

if(!$con){
    die("Could not connect");
}
echo "connection successful"
//mysqli_select_db($con,$db) ;

?>
