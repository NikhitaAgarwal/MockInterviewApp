<?php
$sid=$_GET["sid"];
include ('db.php');
$con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);

$sql="delete from subject where sid='$sid'";
$result=mysqli_query($con,$sql);
if(mysqli_affected_rows($con))
{
    echo "Deleted Succesfully";
    //$response=array("errorcode"=>"000","message"=>"Deleted succesfully");
    //echo json_encode($response);
}
else{
    echo "Unable to delete";
    //$response=array("errorcode"=>"001","message"=>"Enable to delete");
    //echo json_encode($response);
}
mysqli_close($con);
?>