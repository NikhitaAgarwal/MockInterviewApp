<?php
include('db.php');
$con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
$sql="SELECT * FROM question WHERE qid NOT in(SELECT qid FROM interviewexam ie,interviewexamquestion iq WHERE ie.intid=iq.intid and cid='aditya@gmail.com')";
$res=mysqli_query($con,$sql);
$subjects=getsubjects($con);
getsubjectid($con,$subjects);

/*if(isset($res))
{
    $array=[];
    while($row=mysqli_fetch_assoc($res))
    {
        $array[]=$row;
    }
    $response['question']=$array;
    echo json_encode($response);
}*/

function getsubjects($con)
{
    $sql1="select skills from candidate where emailid='arpitasarabi28@gmail.com'";
    $res=mysqli_query($con,$sql1);
    if(isset($res))
    {
      $array=[];
      while($row=mysqli_fetch_assoc($res))
      {

          $skills=$row['skills'];
          $array=explode(',',$skills);
          $array[]=$skills;
      }
      return $array;
      echo json_encode($array);

    }
}

function getsubjectid($con,$subjects)
{
    $array=[];
 foreach($subjects as $subject)
 {
    $sql2="select sid from subject where sname='$subject'";
    $result=mysqli_query($con,$sql2);
    if(isset($result))
    {
      
      while($row=mysqli_fetch_assoc($result))
      {
        $array[]=$row['sid'];
      } 
    } 
 }
 echo json_encode($array);
}
mysqli_close($con);
?>