<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $sname=$_POST["sname"];
    include('db.php');
    $con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
    $sql="select sid from subject where sname='$sname'";
    $res=mysqli_query($con,$sql);
    if($row=mysqli_fetch_array($res))
    {
         
        $sid = $row['sid'];
    echo $sid;    }
    else{
        echo "Oops";
    }
    mysqli_close($con);
}
?>