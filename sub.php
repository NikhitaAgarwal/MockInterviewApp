<?php 
$sid=$_POST["sid"];
$sname=$_POST["sname"];
    include('db.php');
    $con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
    //read the json file contents
    $jsondata = file_get_contents('subject.json');
    
    //convert json object to php associative array
    $data = json_decode($jsondata, true);
    
    //get the employee details
    $sid = $data['sid'];
    $sname = $data['sname'];
    //insert into mysql table
    $sql="INSERT into subject  (sid,sname)
 values('$sid','$sname')";
if(mysqli_query($con,$sql))
   {
    $response=array("errorcode"=>"000","message"=>"Inserted Succesfully");
    echo json_encode($response);
     }
     else{
        $response=array("errorcode"=>"001","message"=>"Enable to insert");
        echo json_encode($response);
     }

?>