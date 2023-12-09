<?php

    $intid=$_POST["intid"];
    $qid=$_POST["qid"];
    $ganswer=$_POST["ganswer"];
    include('db.php');
    $con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
    if(empty($_POST['ganswer']))
    {
        echo "Please answer the question";
    }
    else{
          $getanswer="select answer1,answer2 from question where qid='$qid'";
          $res=mysqli_query($con,$getanswer);
          $array=[];
          while($row=mysqli_fetch_assoc($res))
        {
          $str1=$array[]=$row['answer1'];
          $str2=$array[]=$row['answer2'];
        }
            $ganswer=removebadwords($ganswer);
            $str1=removebadwords($str1);
            $str2=removebadwords($str2);

             similar_text($ganswer,$str1,$percent); 
             echo $percent; 
            echo "<br>";

             similar_text($ganswer,$str2,$percent1);
            echo "<br>";
            echo $percent1;
           
             if($percent>=50.00)

                { 
                    $sql="INSERT INTO interviewexamquestion(intid,qid,ganswer,answeraccuracy) values('$intid','$qid','$ganswer','$percent')";
                    if(mysqli_query($con,$sql))
                    {
                    
                     echo "Success";
                    }
                    else{
                     echo "Unsuccesful";
                    }   
                 }

                else{
                    $sql1="INSERT INTO interviewexamquestion(intid,qid,ganswer,answeraccuracy) values('$intid','$qid','$ganswer','$percent1')";
                    if(mysqli_query($con,$sql1))
                    {
                     echo "Success";
                    }
                    else{
                     echo "Unsuccesful";
                    }   
                
            }
        }  
         mysqli_close($con);

 function removebadwords($x)
{
$x=strtoupper($x);
$y="the is of as his and at into in from for to ago aside hence like near per next than with up but away after next down about above by uses use it on a basically or type types be are this that then called known thier knew can used it its all or you kind called which however whenever can't don't among component store has parts part an etc type are follow following syntax";
$y=strtoupper($y);
$result=str_replace(",","",$x);
$words=explode(" ", $result);
$rwords=[];
$pos=0;
foreach($words as $word)
{
$flag=stripos($y,$word);
//echo "Index".strval($flag);
if($flag===false)
{
 $rwords[$pos]=$word;
 
 //echo $rwords[$pos];
 //echo "<br>";
 $pos++;
}
//echo strpos($y,$word);
//echo "<br>"; 
}
$finalword=join(" ",$rwords);
return $finalword;
}
       
?>