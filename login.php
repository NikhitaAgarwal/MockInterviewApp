<?php
$emailid=$_POST["emailid"];
$password=$_POST["password"];
//$mobileno=$_POST["mobileno"];
include('db.php');
$con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
$sql="select * from user where emailid='$emailid' and password='$password'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);

if(isset($row))

//if($emailid==$row[""]&& $password==$row[""])
{
/* $response=array("errorcode"=>"000","message"=>"success","usertype"=>$row["type"]);
 echo json_encode($response);*/
 echo "true;".$row['type'];
}
else 
{
 /*$response=array("errorcode"=>"001","message"=>"invalid username or password");
 echo json_encode($response);*/
 echo "error";
}
//else{
  //  $sql1="INSERT INTO user"
  mysqli_close($con);
//}
?>