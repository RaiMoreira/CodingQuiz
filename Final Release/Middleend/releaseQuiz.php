<?php

    session_start();

    include('theader.php');

?>

<?php

    $Name = $_POST['quizname'];

    

    $fields = json_encode(array('QuizName' => $Name));

    //echo $fields;

    

    $crl = curl_init();

    curl_setopt($crl, CURLOPT_URL, "https://web.njit.edu/~hk264/hkhan/releaseQuizGrade.php");

    curl_setopt($crl, CURLOPT_POST, true);

    curl_setopt($crl, CURLOPT_POSTFIELDS, $fields);

    curl_setopt($crl, CURLOPT_FOLLOWLOCATION, 1);

    

    $outputDB = curl_exec($crl);

    curl_close($crl); 

    

?>
