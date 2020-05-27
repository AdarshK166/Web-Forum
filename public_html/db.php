<?php
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
//or die("Could not connect") or die("No database")