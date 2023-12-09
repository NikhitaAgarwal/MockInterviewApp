<?php
include('db.php');

$con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
$sql="select ssid,topic,weblink,studyset.sid as qsid,sname from studyset,subject where studyset.sid=subject.sid order by date asc";
$result=mysqli_query($con,$sql);
if(isset($result))
{

    $arr=[];
    while($row=mysqli_fetch_assoc($result))
    {
      $arr[]=$row;
    }
    $response['studyset']=$arr;
    echo json_encode($response);
    
}
?>