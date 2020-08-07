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
//mysqli_select_db($con,$db) ;

?>
