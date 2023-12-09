<?php
 include('db.php');
         
         $qid=$_GET["qid"];
         $title=$_GET["title"];
         $answer1=$_GET["answer1"];
         $answer2=$_GET["answer2"];
         $sname=$_GET["sname"];
         
         
    $con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
    $sql1="select sid from subject where sname='$sname'";
    $save=mysqli_query($con,$sql1);
    $result=mysqli_fetch_array($save);
    if(isset($result))
    {
      $sid = $result['sid'];
    $sql="select * from question where qid='$qid'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    if(isset($row))
    {
    $updatesql="update question set title='$title',answer1='$answer1',answer2='$answer2',sid='$sid' where qid='$qid'" ;
    $res=mysqli_query($con,$updatesql);
    if(isset($res))
    {
      echo "Updated Succesfully";
    }
    }
  
    else{
      echo "Unable to update";
    }
  
    }
  else{
    echo "Unable";
  }
 mysqli_close($con);
 ?>