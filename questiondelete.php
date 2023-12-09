<?php

$qid=$_GET["qid"];
include ('db.php');
$con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);

$sql="delete from question where qid='$qid'";
$result=mysqli_query($con,$sql);
if(mysqli_affected_rows($con)>0)
{
  echo "Deleted Succesfully";
}
else{
  echo "Unable to delete";   
}
mysqli_close($con);
?>