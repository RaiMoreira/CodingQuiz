<?php

    session_start();

    include('theader.php');

        $quizName = $_POST['quizName'];

        $startDate = $_POST['startDate'];

        $endDate = $_POST['endDate'];

	$OE = $_POST['openended'];

	

	$fields = json_encode(array('QuizName' => $quizName, 'StartDate' => $startDate, 'EndDate' => $endDate,'OpenEnded' => $OE));



	

	$crl = curl_init();

	//curl_setopt($crl, CURLOPT_URL, "http://web.njit.edu/~ovl2/CS490/Back/createQuiz.php");

	curl_setopt($crl, CURLOPT_URL, "https://web.njit.edu/~rm454/addquiz2.php");

	curl_setopt($crl, CURLOPT_POST, 1);

	curl_setopt($crl, CURLOPT_POSTFIELDS, $fields);

	curl_setopt($crl, CURLOPT_FOLLOWLOCATION, 1);



	$c = curl_exec($crl);

	curl_close($crl);

	//include('../footer.html');

?>