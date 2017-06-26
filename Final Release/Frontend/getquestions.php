<?php

	     $con = mysql_connect("sql1.njit.edu","hk264","1234");

    if(!$con) {

        die('Could not connect: ' . mysql_error());

    }



    mysql_select_db("hk264", $con);


    



    $sqlOE = mysql_query("SELECT Question, QuestionNum FROM openended");

$sqlEasy = mysql_query("SELECT Question, QuestionNum FROM openended WHERE Difficulty='Easy'");
$sqlMedium = mysql_query("SELECT Question, QuestionNum FROM openended WHERE Difficulty='Medium'");
$sqlHard = mysql_query("SELECT Question, QuestionNum FROM openended WHERE Difficulty='Hard'");

    $OEquestions = array();

     

    $Easyquestions = array();

    $Mediumquestions = array();

    $Hardquestions = array();

    

    while($e = mysql_fetch_assoc($sqlEasy)) {

            $Easyquestions[] = $e;

    }

    

    while($m = mysql_fetch_assoc($sqlMedium)) {

            $Mediumquestions[] = $m;

    }

    

    while($h = mysql_fetch_assoc($sqlHard)) {

            $Hardquestions[] = $h;

    }

    while($oe = mysql_fetch_assoc($sqlOE)) {

            $OEquestions[] = $oe;

    }

    


    

    

    $Qus = json_encode(array('openended' => $OEquestions, 'Easy' => $Easyquestions, 'Medium' => $Mediumquestions, 'Hard' => $Hardquestions));



    $crl = curl_init();

    curl_setopt($crl, CURLOPT_URL, "https://web.njit.edu/~rm454/hkhan/quiz.php");

    curl_setopt($crl, CURLOPT_POST, true);

    curl_setopt($crl, CURLOPT_POSTFIELDS, $Qus);

    curl_setopt($crl, CURLOPT_FOLLOWLOCATION, 1);

    

    $outputDB = curl_exec($crl);

    curl_close($crl); 

?>