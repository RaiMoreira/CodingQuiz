<?php

    $con = mysql_connect("sql1.njit.edu","hk264","1234");

    if(!$con) {

        die('Could not connect: ' . mysql_error());

    }



    mysql_select_db("hk264", $con);

    

   

    $sqlOE = mysql_query("SELECT Question FROM OpenEnded");



    $OEquestions = array();


    while($oe = mysql_fetch_assoc($sqlOE)) {

            $OEquestions[] = $oe;

    }

    

    //echo json_encode($MCquestions);

    //echo json_encode($TFquestions);

    

    $Qus = json_encode(array('OpenEnded' => $OEquestions));

    

    $crl = curl_init();

    //curl_setopt($crl, CURLOPT_URL, "http://web.njit.edu/~ovl2/CS490/Front/login.php");

    curl_setopt($crl, CURLOPT_URL, "https://web.njit.edu/~rm454/quiz.php");

    curl_setopt($crl, CURLOPT_POST, 1);

    curl_setopt($crl, CURLOPT_POSTFIELDS, $Qus);

    curl_setopt($crl, CURLOPT_FOLLOWLOCATION, 1);

    

    $outputDB = curl_exec($crl);

    curl_close($crl);

?>