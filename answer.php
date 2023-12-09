<?php
$intid=$_GET['intid'];
include('db.php');
$con=mysqli_connect($host,$dbuser,$dbpassword,$dbname);
//$getdata="select interviewexamquestion.qid,ganswer,title,answer1,answer2 from interviewexamquestion,question where intid='i1' and interviewexamquestion.qid=question.qid";
$getdata="select interviewexamquestion.qid,ganswer,title,answer1,answer2 from interviewexamquestion,question where intid='$intid' and interviewexamquestion.qid=question.qid";
$res=mysqli_query($con,$getdata);
$array=[];
/*while($row=mysqli_fetch_assoc($res))
{
    $array[]=$row;
}
echo json_encode($array);*/

?>

<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <title>Details</title>
    
    <style>
        table {
            margin: 0 auto;
            font-size: large;
            border: 1px solid black;
        }
 
        h1 {
            text-align: center;
            color: #006600;
            font-size: xx-large;
            font-family: 'Gill Sans', 'Gill Sans MT',
            ' Calibri', 'Trebuchet MS', 'sans-serif';
        }
 
        td {
            background-color: #E4F5D4;
            border: 1px solid black;
        }
 
        th,
        td {
            font-weight: bold;
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
 
        td {
            font-weight: lighter;
        }
    </style>
</head>
 
<body>
    <section>
        <h1>Details</h1>
        <!-- TABLE CONSTRUCTION -->
        <table>
            <tr>
                <th>Question</th>
                <th>Answer 1</th>
                <th>Answer 2</th>
            </tr>
            <!-- PHP CODE TO FETCH DATA FROM ROWS -->
            <?php
                // LOOP TILL END OF DATA
                while($rows=$res->fetch_assoc())
                {
            ?>
            <tr>
                <!-- FETCHING DATA FROM EACH
                    ROW OF EVERY COLUMN -->
                <td><?php echo json_encode($rows['title']);?></td>
                <td><?php echo json_encode($rows['answer1']);?></td>
                <td><?php echo json_encode($rows['answer2']);?></td>
            </tr>
            <?php
                }
            ?>
        </table>
    </section>
</body>
 
</html>