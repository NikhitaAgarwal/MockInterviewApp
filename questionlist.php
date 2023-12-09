<?php
include('db.php');
$con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
$sql="select qid,title,answer1,answer2,question.sid as qsid,sname from question,subject where question.sid=subject.sid order by date asc";
$res=mysqli_query($con,$sql);

if(isset($res))
{
    $array=[];
    while($row=mysqli_fetch_assoc($res))
    {
        $array[]=$row;
    }
    $response['question']=$array;
    echo json_encode($response);
}
?>