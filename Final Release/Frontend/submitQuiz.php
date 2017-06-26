<?php 
session_start();

    $OE = $_POST['openended'];

    $Name = $_POST['quizname'];

    $User = $_POST['user'];
    
    $Qu=$_POST['Que'];



 $fields = json_encode(array('OpenEnded' => $OE, 'Quizname'=>$Name,'User'=>$User,'Ques'=>$Qu));


      
    //echo $fields;

    

    $crl = curl_init();


    //curl_setopt($crl, CURLOPT_URL, "https://web.njit.edu/~hk264/hkhan/grade.php");

    curl_setopt($crl, CURLOPT_URL, "https://web.njit.edu/~mo75/hkhan/populate.php");

    curl_setopt($crl, CURLOPT_POST, true);

    curl_setopt($crl, CURLOPT_POSTFIELDS, $fields);

    curl_setopt($crl, CURLOPT_FOLLOWLOCATION, 1);

    

    $outputDB = curl_exec($crl);

    curl_close($crl);


    
?>