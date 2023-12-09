<?php
include('db.php');
$intid=$_POST["intid"];
$con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);

$getquestion="select count(qid) as count from interviewexamquestion where intid='$intid'";
$result=mysqli_query($con,$getquestion);
$row=mysqli_fetch_array($result);
$count = $row['count'];
if(isset($row)>0)
{
  if($count<3)
  {
    $updatesql="update interviewexam set result='Fail' where intid='$intid'" ;
    $res=mysqli_query($con,$updatesql);
    if(isset($res))
    {     
      $sum="select sum(answeraccuracy) as ans from interviewexamquestion where intid='$intid'";
      $sample=mysqli_query($con,$sum);
      $fetch=mysqli_fetch_array($sample);
      if(isset($fetch)>0)
      {
        $total=$fetch['ans'];
        $average=$total/$count;
        echo $average;
        $updatesql3="update interviewexam set score='$average' where intid='$intid'" ;
        $res=mysqli_query($con,$updatesql3);
       if(isset($res))
      {
        echo "Better Luck next Time";
      }
      }
    else{
      echo "Unable to update";
    }
  }
}

else{
    $getpercent="select sum(answeraccuracy) as answer from interviewexamquestion where intid='$intid'";
    $res1=mysqli_query($con,$getpercent);
    $row1=mysqli_fetch_array($res1);
    if(isset($res1)>0)
    {
      $total1=$row1['answer'];
      $average1=$total1/$count;
      
      if($average1>=50.00)
      {
        $updatesql1="update interviewexam set result='Pass' where intid='$intid'" ;
        $res=mysqli_query($con,$updatesql1);
        if(isset($res))
        {
          $updatesql3="update interviewexam set score='$average1' where intid='$intid'" ;
        $res=mysqli_query($con,$updatesql3);
       if(isset($res))
        {
        echo "Congrats";
      }
          //echo $average1;
        }
        else
        {
          echo "Unable to update";
        }
      }
      else
      {
        $updatesql2="update interviewexam set result='Fail' where intid='$intid'" ;
        $res=mysqli_query($con,$updatesql2);
        if(isset($res))
        {
          $updatesql3="update interviewexam set score='$average1' where intid='$intid'" ;
          $res=mysqli_query($con,$updatesql3);
        if(isset($res))
        {
        echo "Better Luck next Time";
         }
          //echo  $average1;
        }
        else
        {
          echo "Unable to update";
        }
      }
    }
}
}




mysqli_close($con);

?>