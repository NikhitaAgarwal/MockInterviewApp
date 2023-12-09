<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
$title=$_POST["title"];
$answer1=$_POST["answer1"];
$answer2=$_POST["answer2"];
$sname=$_POST["sname"];
include('db.php');
$con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
   if (empty($_POST['title']) ||empty($_POST['answer1'])||empty($_POST['answer2']) )
  // empty($_POST['sid'])
   {
  die('Please fill all the fields');
  }
  else
  {
//   $id=newquestionid();
     $id=nextqid();
   $sql="select sid from subject where sname='$sname'";
   $save=mysqli_query($con,$sql);
   $result=mysqli_fetch_array($save);
   if(isset($result))
   {
      $sid = $result['sid'];
   $Sql_Query ="INSERT INTO question(qid,title,answer1,answer2,sid)
   values ('$id','$title','$answer1','$answer2', '$sid') order by date asc";
    $res=mysqli_query($con,$Sql_Query);
     if(isset($res))
     {
      echo $id;
      // echo "Inserted succesfully";
     }
     else
     {
        echo "Unable to insert";
     }
   
  }
}

/*else
   {
    echo "Something went wrong";
   }*/
mysqli_close($con);
}
function newquestionid(){
   include('db.php');
   $con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
   $sql="select max(qid) as max from question order by date asc";
   $result=mysqli_query($con,$sql);
   $row=mysqli_fetch_assoc($result);
   if(isset($row))
   {
   $maxqid=intval(substr($row["max"],1));
   $nextqid=$maxqid+1;
   return "q".$nextqid;;
 }
 else
   return "0";
 }

 function nextqid(){
    $qids=[];
    include('db.php');
    $con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
    $sql="select * from question";
    $result=mysqli_query($con,$sql);
    $i=0;
    while($row=mysqli_fetch_assoc($result))
    {
     $qids[$i]=intval(substr($row["qid"],1));
     $i++;
    }
    sort($qids,2);
    $m=max($qids);
    $qid=$m+1;
    $nextqid='q'.$qid;
    return $nextqid;
 }
?>