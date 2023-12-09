<?php
include('db.php');
$sid=$_GET['sid'];
$con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
$sql="select * from subject where sid='$sid'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
if(isset($row))
{
    echo $row["sname"];
}
else{
    echo "Invalid";
}
mysqli_close($con);

?>