<html>
    <head>Details</head>
    <body>
<?php
include('db.php');
$con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
$sql="select * from interviewexam";
//$sql="select intid,cid,qid,ganswe from interviewexam,interviewexamquestion where interviewexam.intid=interviewexamquestion.intid";
$res=mysqli_query($con,$sql);
if(isset($res))
{
$array=[];
    while($row=mysqli_fetch_assoc($res))
    {
        $array[]=$row;
    }
    $response['deatils']=$array;
    //echo json_encode($response);

}
?>
Result<?php echo  $row[$intid];  ?></br>
Result<?php echo json_encode($response); ?></br>
Result<?php echo json_encode($response); ?></br>
Result<?php echo json_encode($response); ?></br>
Result<?php echo json_encode($response); ?></br>
Result<?php echo json_encode($response); ?></br>
Result<?php echo json_encode($response); ?></br>
Result<?php echo json_encode($response); ?></br>
</body>
</html>


   
