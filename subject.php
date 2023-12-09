<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
$sname=$_POST["sname"];
include('db.php');
$con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
/*$select_sql="SELECT count(*) as count from subject";
$result=mysqli_query($con,$select_sql);
$row=mysqli_fetch_array($result);
$count = $row['count'];
if(isset($row)>0)
   {
       ++$count;
       $strcount=strval($count);
       $res="s".$strcount;*/
       if (empty($_POST['sname'])){
       die('Please Enter the Subject Name');
       }
       $sql="select * from subject where sname='$sname'";
       $result = mysqli_query($con, $sql);

     if (mysqli_fetch_array($result) > 0){
        echo "Entered Subject name already exists";
     }
   
   
     else{
     // $res=newsubjectid();
        $res=nextsid();
        $sql="INSERT INTO subject (sid,sname) values('$res','$sname')";
        if(mysqli_query($con,$sql))
        {
         //echo "Inserted Succesfully";
         echo $res;
        }
        else{
         echo "Unsuccesful";
        }
      }
  
     mysqli_close($con);
   }
   /* function newsubjectid(){
      include('db.php');
      $con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
      $sql="select max(sid) as max from subject order by sid";
      $result=mysqli_query($con,$sql);
      $row=mysqli_fetch_assoc($result);
      if(isset($row))
      {
      $maxsid=intval(substr($row["max"],1));
      $nextsid=$maxsid+1;
      return "s".$nextsid;
    }
    else
      return "0";
    }*/
    function nextsid(){
      $sids=[];
      include('db.php');
      $con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
      $sql="select * from subject";
      $result=mysqli_query($con,$sql);
      $i=0;
      while($row=mysqli_fetch_assoc($result))
      {
       $sids[$i]=intval(substr($row["sid"],1));
       $i++;
      }
      sort($sids,2);
      $m=max($sids);
      $sid=$m+1;
      $nextsid='s'.$sid;
      return $nextsid;
   }
?>