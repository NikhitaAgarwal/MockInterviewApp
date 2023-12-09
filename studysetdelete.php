<?php

$ssid=$_GET["ssid"];
include ('db.php');
$con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);

$sql="delete from studyset where ssid='$ssid'";
$result=mysqli_query($con,$sql);
if(mysqli_affected_rows($con)>0)
{ 
    echo "deleted Succesfully";
}
else{
    $response=array("errorcode"=>"001","message"=>"Enable to delete");
    echo json_encode($response);
}
mysqli_close($con);
?>