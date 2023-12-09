<?php
include('db.php');
$sql="select * from subject";
$con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
if(!$con->query($sql)){
    echo "Error in connecting to database";
}
    else{
        $result=$con->query($sql);
        if($result->num_rows>0)
        {
            $return_arr['subject']=array();
            while($row=$result->fetch_array()){
                array_push($return_arr['subject'],array(
                    'sid'=>$row['sid'],
                    'sname'=>$row['sname']
                ));
            }
            echo json_encode($return_arr);
        }

    }

?>