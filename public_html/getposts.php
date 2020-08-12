<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Bare - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
<?php
include "db.php";

$q = intval($_GET['q']);

if($q == 11){
    $insert_query = "select * from tbl_post ";
}
else{
    $insert_query = "select * from tbl_post where cat_id='".$q."'";
}


$res=mysqli_query($con, $insert_query);

if(mysqli_num_rows($res)>0){
    
    while($row=mysqli_fetch_assoc($res)){
        
        $z="select COUNT(comment) from comments where post_id=$row[post_id]";
        $zz=mysqli_query($con, $z);
        $zzz=mysqli_fetch_array($zz);
        

echo "<tr>
<td><a href=\"post.php?id=$row[post_id]\" class=\"text-dark\">$row[post_title]</a></td>
<td>$row[post_content]</td>
<td>$zzz[0]</td>
<td>$row[post_time]</td>
</tr>";

    }
    }
else
{
  echo "<tr>
<td>No Forums Found</td>
<td></td>
<td></td>
<td></td>
</tr>";
}

?>

<script src="vendor/jquery/jquery.slim.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
