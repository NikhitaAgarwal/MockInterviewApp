<?php
include('db.php');

//$emailid=$_POST["emailid"];


$con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
//$sql="select * from candidate where emailid='$emailid'";
$sql="select * from candidate";
$res=mysqli_query($con,$sql);
if(isset($res))
{
    $array=[];
    while($row=mysqli_fetch_assoc($res))
    {
        $array[]=$row;
       
    }
    $response['candidate']=$array;
    echo json_encode($response);
}

?>