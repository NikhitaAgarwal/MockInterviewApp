<?php
$intid=$_GET["intid"];
include('db.php');
$con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
$sql="select title,answer1,ganswer from question,interviewexamquestion where question.qid=interviewexamquestion.qid and intid='$intid'";
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