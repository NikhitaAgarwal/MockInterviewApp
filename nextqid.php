<?php
function nextqid(){
   $qids=[];
   include('db.php');
   $con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
   $sql="select * from question ";
   $result=mysqli_query($con,$sql);
   $i=0;
   while($row=mysqli_fetch_assoc($result))
   {
    $qids[$i]=intval(substr($row["qid"],1));
    $i++;
   }
   sort($qids,2);
   $m=max($qids);
   $qid=$m+1;
   $nextqid='q'.$qid;
   return json_encode($nextqid);
}
?>