
<?php
include('db.php');
$con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
$sql="SELECT * FROM interviewexam,candidate where cid=emailid and result='Pass' ORDER BY score DESC LIMIT 5";
$res=mysqli_query($con,$sql);
if(isset($res))
{
    $array=[];
    while($row=mysqli_fetch_assoc($res))
    {
        $array[]=$row;
       
    }
    $response['exam']=$array;
    echo json_encode($response);
}
?> 