<?php

    session_start;

    //include('sheader.php');



    $con = mysql_connect("sql1.njit.edu","hk264","1234");

    if(!$con) {

        die('Could not connect: ' . mysql_error());

    }



    mysql_select_db("hk264", $con);

    

    $Request = file_get_contents('php://input');

   
    $Quiz = json_decode($Request);

echo $Quiz;

    $Name = $Quiz->QuizName;

 echo $Name;
    
    $User = 'User';



    $QuizName = $Name.$User;


    $result = mysql_query("SELECT Question, Answer, YourAnswer, CorrInc, PointRec, QuestionNum FROM $Name");

    

    $list = array();

    

    while($q = mysql_fetch_assoc($result)) {

            $list[] = $q;

    }

//print_r($list);

    $x = json_encode(array('Quiz' => $list));
 


    $crl = curl_init();

    curl_setopt($crl, CURLOPT_URL, "https://web.njit.edu/~hk264/hkhan/review.php");

    curl_setopt($crl, CURLOPT_POST, true);

    curl_setopt($crl, CURLOPT_POSTFIELDS, $x);

    curl_setopt($crl, CURLOPT_FOLLOWLOCATION, 1);

    

    $outputDB = curl_exec($crl);

    curl_close($crl);


echo "Work in Progress";

?>