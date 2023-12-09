
<?php


include('db.php');
$cid=$_GET["cid"];
$sql="select * from interviewexam where cid='$email'";
$con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
if(!$con->query($sql)){
    echo "Error in connecting to database";
}
    else{
        $result=$con->query($sql);
        if($result->num_rows>0)
        {
            $return_arr['interviewexam']=array();
            while($row=$result->fetch_array()){
                array_push($return_arr['interviewexam'],array(
                    'intid'=>$row['intid'],
                    'cid'=>$row['cid']
                ));
            }
            echo json_encode($return_arr);
        }

    }
?>