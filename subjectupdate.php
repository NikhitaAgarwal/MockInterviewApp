<?php
 include('db.php');
        $sid=$_GET["sid"];
         $sname=$_GET["sname"];
    
    $con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
    $sql="select * from subject where sid='$sid'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    if(isset($row))
    {
    $updatesql="update subject set sname='$sname' where sid='$sid'" ;
    $res=mysqli_query($con,$updatesql);
    if(isset($res))
    {
      echo "Updated Succesfully";
    }
    else{
      echo "Unable to update";
    }
    }
 mysqli_close($con);
 
 ?>

 
 