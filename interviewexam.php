<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
$cid=$_POST["cid"];
include('db.php');
$con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
        $res=nextid();
        $sql="INSERT INTO interviewexam(intid,cid,etime,duration,result,score) values('$res','$cid','20:0','40:0:0','','') order by intdate";
        if(mysqli_query($con,$sql))
        {
         echo $res;
        }
        else{
         echo "Unsuccesful";
        }
      }
  
     mysqli_close($con);
   
   
    function nextid(){
      $intids=[];
      include('db.php');
      $con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
      $sql="select * from interviewexam";
      $result=mysqli_query($con,$sql);
      $i=0;
      while($row=mysqli_fetch_assoc($result))
      {
       $intids[$i]=intval(substr($row["intid"],1));
       $i++;
      }
      sort($intids,2);
      $m=max($intids);
      $intid=$m+1;
      $nextintid='i'.$intid;
      return $nextintid;
   }
   ?>