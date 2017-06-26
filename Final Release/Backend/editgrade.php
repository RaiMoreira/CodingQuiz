<?php
session_start();
include('theader.php');
 $con = mysql_connect("sql1.njit.edu","hk264","1234");

    if(!$con) {

        die('Could not connect: ' . mysql_error());

    }



    mysql_select_db("hk264", $con);


 $request = file_get_contents('php://input');

                        $q = json_decode($request);

$Name = $_POST['var'];
$Comment= $_POST['comm'];
$Pointalt = $_POST['pointalt'];


$sizeOC = Sizeof($Comment);
$sizePO = Sizeof($Pointalt);


for ($i=0; $i<$sizeOC; $i++) {
        
       $num1 = $Comment[$i];
       $num2 = ($i+1);


    $sql3 = mysql_query("UPDATE $Name Set Comment = '$num1' WHERE QuestionNum = '$num2'");
       
       }
       
       
for ($i=0; $i<$sizePO; $i++) {
        
       $num3 = $Pointalt[$i];
       $num4 = ($i+1);


    $sql4 = mysql_query("UPDATE $Name Set PointRec = '$num3' WHERE QuestionNum = '$num4'");
       
       }
       
       for ($i=0; $i<$sizePO; $i++) {
        
       $num5 = $Pointalt[$i];
       $num6 += $num5;
    
       }
       
        $sql5= mysql_query("UPDATE grades Set Grade = '$num6' WHERE QuizName = '$Name'");
 $sql6= mysql_query("UPDATE grades Set TotalCorrect = '$num6' WHERE QuizName = '$Name'");


echo "Changes made!";


?>