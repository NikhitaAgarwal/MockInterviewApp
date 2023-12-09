<?php
/*$emailid=$_POST["emailid"];
include('db.php');
$con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
$sql="select emailid,password from candidate where emailid='$emailid'";
$res=mysqli_query($con,$sql);
$response=array();
if(mysqli_num_rows($res)>0)
{
$row=mysqli_fetch_assoc($res);
mail($emailid,'OTP Verification','12345 your otp','nikitagagarwal@gmail.com');
echo "succes";
}
else{
    echo "Fail";
}
mysqli_close($con);
?> */


$to = "arpitasarabi28@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: nikitagagarwal.com" . "\r\n" .
"CC: somebodyelse@example.com";

mail($to,$subject,$txt,$headers);
?>


