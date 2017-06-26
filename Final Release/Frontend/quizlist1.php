<?php

    session_start();

    //include('sheader.php');

?>



<?php

     $con = mysql_connect("sql1.njit.edu","hk264","1234");

    if(!$con) {

        die('Could not connect: ' . mysql_error());

    }



    mysql_select_db("hk264", $con);

    

    $Quiz = mysql_query("SELECT QuizName, ID  FROM quizzes");

    

    $listQuiz = array();

    

    while($q = mysql_fetch_assoc($Quiz)) {

            $listQuiz[] = $q;

    }

    

    $list = json_encode(array('Quizzes' => $listQuiz));

    //echo $list;

    

    $crl = curl_init();

    //curl_setopt($crl, CURLOPT_URL, "http://web.njit.edu/~rab25/CS490/Middle/quizList.php");

    curl_setopt($crl, CURLOPT_URL, "https://web.njit.edu/~rm454/hkhan/quizlist.php");

    curl_setopt($crl, CURLOPT_POST, true);

    curl_setopt($crl, CURLOPT_POSTFIELDS, $list);

    curl_setopt($crl, CURLOPT_FOLLOWLOCATION, 1);

    

    $outputDB = curl_exec($crl);

    curl_close($crl);

?>

    <head>
    <link rel="stylesheet" type="text/css" href="tablestyle.css">
    </head>