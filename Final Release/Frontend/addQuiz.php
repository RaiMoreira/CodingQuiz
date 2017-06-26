<?php

    session_start();

    //include('theader.php');

        $quizName = $_POST['quizName'];

		    $startDate = $_POST['startDate'];

		    $endDate = $_POST['endDate'];
		   $E = $_POST['easy'];

		    $M = $_POST['medium'];

		    $H = $_POST['hard'];
		    

$fields = json_encode(array('QuizName' => $quizName, 'StartDate' => $startDate, 'EndDate' => $endDate,'Easy' => $E, 'Medium' => $M, 'Hard' => $H));


//print_r($fields);
	

	$crl = curl_init();


	curl_setopt($crl, CURLOPT_URL, "https://web.njit.edu/~mo75/hkhan/addquiz2.php");

	curl_setopt($crl, CURLOPT_POST, true);

	curl_setopt($crl, CURLOPT_POSTFIELDS, $fields);

	curl_setopt($crl, CURLOPT_FOLLOWLOCATION, 1);



	$c = curl_exec($crl);

	curl_close($crl);



?>