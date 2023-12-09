<?php

$fname=$_GET["fname"];
$lname=$_GET["lname"];
$qualification=$_GET["qualification"];
$college=$_GET["college"];
$yearpassout=$_GET["yearpassout"];
$emailid=$_GET["emailid"];
$skills=$_GET["skills"];
$mobileno=$_GET["mobileno"];
$password=$_GET["password"];
include("db.php");
$con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
$sql="select * from candidate where emailid='$emailid'";
$result=mysqli_query($con,$sql);
 $row=mysqli_fetch_assoc($result);

   if(isset($row))
    {
     
    $updatesql="update candidate set fname='$fname',lname='$lname',qualification='$qualification',college='$college',yearpassout='$yearpassout',skills='$skills',mobileno='$mobileno',password='$password' where emailid='$emailid'" ;
    $res=mysqli_query($con,$updatesql);
    if(isset($res))
    {
      $sql_update="update user set password='$password' where emailid='$emailid'";
       mysqli_query($con,$sql_update);
      echo "Updated Succesfully";
    }
    

    else{
      echo "Unable to update";
    }

}

 mysqli_close($con);
?>
