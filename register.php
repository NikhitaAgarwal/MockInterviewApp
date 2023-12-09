<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$qualification=$_POST["qualification"];
$college=$_POST["college"];
$yearpassout=$_POST["yearpassout"];
$emailid=$_POST["emailid"];
$skills=$_POST["skills"];
$mobileno=$_POST["mobileno"];
$password=$_POST["password"];
//confirmpassword=$_POST["confirmpassword"];	
//global $con;
include('db.php');
$con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
$sql="select * from candidate where emailid='$emailid'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
 if ((isset($row)))
 
{
    echo "email already exist ";
}
else
{
    if (empty($_POST['fname']) ||empty($_POST['lname']) ||empty($_POST['qualification']) ||empty($_POST['college'])||empty($_POST['yearpassout'])
    ||empty($_POST['emailid'])||empty($_POST['skills'])||empty($_POST['mobileno'])||empty($_POST['password'])) {
    
    die('Please fill all required fields!');
}
     $Sql_Query = "INSERT INTO candidate (fname,lname,qualification,college,yearpassout,emailid,skills,mobileno,password)
     values ('$fname','$lname','$qualification','$college','$yearpassout','$emailid','$skills','$mobileno','$password')";
    
     if(mysqli_query($con,$Sql_Query))
     {
       $sql_insert="INSERT INTO user (emailid,password) values ('$emailid','$password')";
       mysqli_query($con,$sql_insert);
            echo "register sucessfull";
     }
         
     
     else{
         echo "something went wrong";
        }
 }
    mysqli_close($con);
}
?>
        
