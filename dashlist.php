<?php
include('db.php');

$con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
$sql="select  * from interviewexam order by score desc";
$result=mysqli_query($con,$sql);
if(isset($result))
{
    $arr=[];
    while($row=mysqli_fetch_assoc($result))
    {
      $arr[]=$row;
    }
    $response['exam']=$arr;
    echo json_encode($response);
}
?>