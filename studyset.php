<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
//$ssid=$_POST["ssid"];
$topic=$_POST["topic"];
$weblink=$_POST["weblink"];

$sname=$_POST["sname"];
//$date=$_POST["date"];
//$sid=$_POST["sid"];
include('db.php');
$con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
       if (empty($_POST['topic'])||(empty($_POST['weblink']))){
       die('Please fill the all details');
       }
       else
      {
        // $id=newstudysetid();
        $id=nextssid();
         $sql="select sid from subject where sname='$sname'";
         $save=mysqli_query($con,$sql);
         $result=mysqli_fetch_array($save);
         if(isset($result))
         {
            $sid = $result['sid']; 
            $sql_insert="INSERT into studyset(ssid,topic,weblink,sid)
            values('$id','$topic','$weblink','$sid')";
            $result1=mysqli_query($con,$sql_insert);
           if(isset($result1))
          {
            echo $id;
          }
            else
          {
           echo "Unable to insert";
          }
        }
      }

mysqli_close($con);
  }
/*function newstudysetid(){
  include('db.php');
  $con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
  $sql="select max(ssid) as max from studyset order by ssid";
  $result=mysqli_query($con,$sql);
  $row=mysqli_fetch_assoc($result);
  if(isset($row))
  {
  $maxssid=intval(substr($row["max"],2));
  $nextssid=$maxssid+1;
  return "ss".$nextssid;
}
else
  return "0";
}*/
function nextssid(){
  $ssids=[];
  include('db.php');
  $con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
  $sql="select * from studyset";
  $result=mysqli_query($con,$sql);
  $i=0;
  while($row=mysqli_fetch_assoc($result))
  {
   $ssids[$i]=intval(substr($row["ssid"],2));
   $i++;
  }
  sort($ssids,2);
  $m=max($ssids);
  $ssid=$m+1;
  $nextssid='ss'.$ssid;
  return $nextssid;
}

?>



