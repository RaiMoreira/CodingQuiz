<?php

	session_start();

	
	$Method = $_POST['method'];

	$Parameters= $_POST['parameters'];

	$Type= $_POST['type'];

	$Action = $_POST['action'];

	$Answer = $_POST['returns'];


	
 $fields = array('method' => $Method, 'parameters' => $Parameters, 'type' => $Type, 'action' => $Action, 'returns' => $Answer);

	$send = json_encode($fields);

$crl = curl_init();

	//curl_setopt($crl, CURLOPT_URL, "http://web.njit.edu/~ovl2/CS490/Back/addQuestions.php");

	curl_setopt($crl, CURLOPT_URL, "https://web.njit.edu/~rm454/sendQuestion.php");

	curl_setopt($crl, CURLOPT_POST, 1);

	curl_setopt($crl, CURLOPT_POSTFIELDS, $send);

	curl_setopt($crl, CURLOPT_FOLLOWLOCATION, 1);

	

	$c = curl_exec($crl);

	curl_close($crl);

	

	



	

?>