<?php 

session_start();

include('theader.php');





    $P = $_POST['points'];

    $name = $_POST['name'];



    $fields = json_encode(array('QuizName' => $name, 'Points' => $P));

    //echo $fields;

    

    $crl = curl_init();

    curl_setopt($crl, CURLOPT_URL, "https://web.njit.edu/~hk264/hkhan/addpoints.php");

    curl_setopt($crl, CURLOPT_POST, true);

    curl_setopt($crl, CURLOPT_POSTFIELDS, $fields);

    curl_setopt($crl, CURLOPT_FOLLOWLOCATION, 1);



    $c = curl_exec($crl);

    curl_close($crl); 

?>