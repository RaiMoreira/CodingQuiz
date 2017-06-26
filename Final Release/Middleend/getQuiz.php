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

    

    $Name = $Quiz->QuizName;


    $quizOE = mysql_query("SELECT Points,Question, QuestionNum FROM `$Name`");

    

    $OEquestions = array();

    
    

    while($oe = mysql_fetch_assoc($quizOE)) {

            $OEquestions[] = $oe;

    }

    

    

    $Quiz = json_encode(array('OpenEnded' => $OEquestions,'QuizName'=> $Name));

    

    

    $crl = curl_init();


    curl_setopt($crl, CURLOPT_URL, "https://web.njit.edu/~hk264/hkhan/takeQuiz.php");

    curl_setopt($crl, CURLOPT_POST, true);

    curl_setopt($crl, CURLOPT_POSTFIELDS, $Quiz);

    curl_setopt($crl, CURLOPT_FOLLOWLOCATION, 1);

    

    $outputDB = curl_exec($crl);

    curl_close($crl); 

?>