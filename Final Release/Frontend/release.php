<?php

    session_start();

    //include('theader.php');
?>
    <head>
    <link rel="stylesheet" type="text/css" href="tablestyle.css">
    </head>
<?php

	     $con = mysql_connect("sql1.njit.edu","hk264","1234");

    if(!$con) {

        die('Could not connect: ' . mysql_error());

    }



    mysql_select_db("hk264", $con);

    

    $gradesR = mysql_query("SELECT DISTINCT QuizName, Released FROM grades");

   // $gradesU = mysql_query("SELECT DISTINCT QuizName, Released FROM Grades WHERE Released = 'Unreleased'");

    

    $listR = array();

    while($r = mysql_fetch_assoc($gradesR)) {

            $listR[] = $r;

    }

    

   /*$listU = array();

    while($u = mysql_fetch_assoc($gradesU)) {

            $listU[] = $u;

    } */



    //$x = json_encode(array('Unreleased' => $listU, 'Released' => $listR));

    $x = json_encode(array('grades' => $listR));

    //echo $x;

    

    

    $crl = curl_init();


    curl_setopt($crl, CURLOPT_URL, "https://web.njit.edu/~mo75/hkhan/release2.php");

    curl_setopt($crl, CURLOPT_POST, true);

    curl_setopt($crl, CURLOPT_POSTFIELDS, $x);

    curl_setopt($crl, CURLOPT_FOLLOWLOCATION, 1);

    

    $outputDB = curl_exec($crl);

    curl_close($crl); 



?>