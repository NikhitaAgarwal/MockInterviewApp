<?php

    $intid=$_POST["intid"];
    $qid=$_POST["qid"];
    //$ganswer=$_POST["ganswer"];
    include('db.php');
    $con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
    
          $getanswer="select answer1,answer2 from question where qid='$qid'";
          $res=mysqli_query($con,$getanswer);
          $array=[];
          while($row=mysqli_fetch_assoc($res))
        {
          $str1=$array[]=$row['answer1'];
          $str2=$array[]=$row['answer2'];
        }
        
            similar_text("",$str1,$percent);
           
            similar_text("",$str2,$percent1);
           
             if($percent>=50.00)
                {
                    
                    $sql="INSERT INTO interviewexamquestion(intid,qid,ganswer,answeraccuracy) values('$intid','$qid','','$percent')";
                    if(mysqli_query($con,$sql))
                    {
                     echo "Success";
                    }
                    else{
                     echo "Unsuccesful";
                    }   
                 }
                else{
                    $sql1="INSERT INTO interviewexamquestion(intid,qid,ganswer,answeraccuracy) values('$intid','$qid','','$percent1')";
                    if(mysqli_query($con,$sql1))
                    {
                     echo "Success";
                    }
                    else{
                     echo "Unsuccesful";
                    }   
                
            }
        
          
     
         mysqli_close($con);
       
?>