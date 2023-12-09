<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
//require './vendor/autoload.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';
include('db.php');
$emailid=$_GET["emailid"];
$con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
$sql="select fname,password from candidate where emailid='$emailid'";
$res=mysqli_query($con,$sql);
$n=mysqli_num_rows($res);
if($n>0)
{
    $arr=[];
    while($row=mysqli_fetch_assoc($res))
    {
        $name= $row["fname"];
       $password= $row["password"];
     //$name=$row[0];
     //$password=$row[1];
    }
    //echo json_encode($name);
    sendPassword($password,$emailid,$name);
}
else
{
    echo "Bad";
}
function sendPassword($password,$emailid,$name)
{
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'mockinterviewteam12@gmail.com';                     //SMTP username
    $mail->Password   = 'jpqcmvnmjqsnzldb';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('mockinterviewteam12@gmail.com', 'MockInterview');
    $mail->addAddress($emailid, $name);     //Add a recipient
    
   
   

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Mockinterview app account password';
    $mail->Body    = "<h2>Your Mockinterview App Account password is as follows<h2><span style='color:blue;font-size:28;'>Password: $password</span>";
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->send();
    echo "Correct";
} catch (Exception $e) {
    echo "Wrong";
}
}