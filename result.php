<?php
include('db.php');
//$intid=$_POST['intid'];
$con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
$getdata="select * from interviewexam";
$res=mysqli_query($con,$getdata);


if(isset($res))
{
    $array=[];
    while($row=mysqli_fetch_assoc($res))
    {
        $array[]=$row;
        
       
    }
    $response['result1']=$array;
    echo json_encode($response);
    
}




?>