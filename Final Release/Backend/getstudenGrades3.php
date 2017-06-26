<?php

    session_start;

    include('theader.php');

?>



<?php

$Name = $_POST['quizname'];

$con = mysql_connect("sql1.njit.edu","hk264","1234");

    if(!$con) {

        die('Could not connect: ' . mysql_error());

    }



    mysql_select_db("hk264", $con);

   

    $grades = mysql_query("SELECT QuizName, TotalCorrect, TotalPoints,StudentID, Grade FROM grades WHERE StudentID = 'rm454' AND QuizName='$Name'");

   // $info = mysql_fetch_assoc($grades);


   // $id = $info['QuizID'];

    

    $quizGrades = array();



    while($qg = mysql_fetch_assoc($grades)) {

            $quizGrades[] = $qg;

    }

    //print_r($quizGrades);

    $fields = json_encode(array('Quizzes' => $quizGrades));

    //echo $fields;
    

    

   $crl = curl_init();


    curl_setopt($crl, CURLOPT_URL, "https://web.njit.edu/~hk264/hkhan/displayGrades2.php");

    curl_setopt($crl, CURLOPT_POST, true);

    curl_setopt($crl, CURLOPT_POSTFIELDS, $fields);

    curl_setopt($crl, CURLOPT_FOLLOWLOCATION, 1);

    

    $outputDB = curl_exec($crl);

    curl_close($crl); 

?>