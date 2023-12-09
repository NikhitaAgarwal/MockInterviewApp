<?php
include('db.php');

$con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
$sql="select * from subject ";
$result=mysqli_query($con,$sql);
if(isset($result))
{
    $arr=[];
    while($row=mysqli_fetch_assoc($result))
    {
      $arr[]=$row;
    }
    $response['subjects']=$arr;
    echo json_encode($response);
}
?>