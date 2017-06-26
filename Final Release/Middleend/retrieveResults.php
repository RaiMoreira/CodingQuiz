<?php
session_start();
//include('sheader.php');

    $Name = $_POST['quizname'];


    $con = mysql_connect("sql1.njit.edu","hk264","1234");

    if(!$con) {

        die('Could not connect: ' . mysql_error());

    }



    mysql_select_db("hk264", $con);



  
   $result = mysql_query("SELECT Question, Answer, YourAnswer, CorrInc, PointRec,Points, QuestionNum,Comment FROM $Name");

    

    $list = array();

    

    while($q = mysql_fetch_assoc($result)) {

            $list[] = $q;

    }

//print_r($list);

    $z = json_encode(array('Quiz' => $list, 'name'=> $Name));
 
 


    $crl = curl_init();

    curl_setopt($crl, CURLOPT_URL, "https://web.njit.edu/~hk264/hkhan/review.php");

    curl_setopt($crl, CURLOPT_POST, true);

    curl_setopt($crl, CURLOPT_POSTFIELDS, $z);

    curl_setopt($crl, CURLOPT_FOLLOWLOCATION, 1);

    

    $outputDB = curl_exec($crl);

    curl_close($crl);


//echo "<strong>Work in Progress</strong>";


?>

