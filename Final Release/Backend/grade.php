<?php

    session_start();

    include('sheader.php');

?>



<?php


     $con = mysql_connect("sql1.njit.edu","hk264","1234");

    if(!$con) {

        die('Could not connect: ' . mysql_error());

    }



    mysql_select_db("hk264", $con);

    $Request = file_get_contents('php://input');

    $Quiz = json_decode($Request);

     $User = $Quiz ->User;

$Name =$Quiz->Quizname;

    $Size = sizeof($Quiz->OpenEnded);

for($i=0;$i<$Size;$i++){
$ans = $Quiz->OpenEnded[$i];

        $qus = $i + 1;

        $addAnsOE = mysql_query("UPDATE $Name set YourAnswer = '$ans' WHERE QuestionNum= '$qus'");

        

        $pointsOE = mysql_query("SELECT Points FROM $Name WHERE QuestionNum='$qus'");

        $infoP = mysql_fetch_assoc($pointsOE);

        $p = $infoP['Points'];        

        

        $gradeOE = mysql_query("SELECT COUNT(*) FROM $Name  WHERE QuestionNum = '$qus' AND Answer = '$ans'");

        $info = mysql_fetch_assoc($gradeOE);

        $correctOE = $info['COUNT(*)'];

      

        if ($correctOE == 1) {

            $addCorInc = mysql_query("UPDATE $Name set CorrInc = 'Correct' WHERE QuestionNum= '$qus'");

            $addPoints = mysql_query("UPDATE $Name set PointRec = '$p' WHERE QuestionNum= '$qus'");

        }

        if ($correctOE == 0) {

            $addCorInc = mysql_query("UPDATE $Name set CorrInc = 'Incorrect' WHERE QuestionNum= '$qus'");

            $addPoints = mysql_query("UPDATE $Name set PointRec = '0' WHERE QuestionNum= '$qus'");

        }

    }

$result = mysql_query("SELECT SUM(PointRec), SUM(Points) FROM $Name"); 

    $row = mysql_fetch_assoc($result); 

    $pr = $row['SUM(PointRec)'];

    $tp = $row['SUM(Points)'];

    
$g = (($pr / $tp)*100);

    $Grade = round($g,2);
    


    $insGrade = "INSERT INTO grades (QuizName, TotalCorrect, TotalPoints, Grade, Released, StudentID) VALUES ('$Name', '$pr', '$tp', '$Grade','Unreleased', '$User')";

    $exec1 = mysql_query($insGrade, $con);

    

    echo "Your quiz has been submitted for Grading."; 
   






  



    
?>
    

   