<?php
 include('db.php');
         
         $ssid=$_GET["ssid"];
         $topic=$_GET["topic"];
         $weblink=$_GET["weblink"];
       //  $yvlink=$_GET["yvlink"];
         $sname=$_GET["sname"];
         
         
    $con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
    $sql1="select sid from subject where sname='$sname'";
    $save=mysqli_query($con,$sql1);
    $result=mysqli_fetch_array($save);
    if(isset($result))
    {
      $sid = $result['sid'];
    $sql="select * from studyset where ssid='$ssid'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    if(isset($row))
    {
    $updatesql="update studyset set topic='$topic',weblink='$weblink',sid='$sid' where ssid='$ssid'" ;
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