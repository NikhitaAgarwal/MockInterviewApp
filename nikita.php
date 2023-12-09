<?Php
include('db.php');
$con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
$sql="SELECT * FROM question";
$res=mysqli_query($con,$sql);
if(isset($res))
{
    $array=[];
    while($row=mysqli_fetch_assoc($res))
    {
        $array[]=$row;
    }
    $response['question']=$array;
    echo json_encode($response);
}

?>
