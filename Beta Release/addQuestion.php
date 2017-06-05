<?php
	session_start();
	
	$method = $_POST['method'];
	$parameters = $_POST['parameters'];
	$type = $_POST['type'];
	$action = $_POST['action'];
	$returns = $_POST['returns'];

	//echo $method;
	//echo $parameters;
	//echo $type;
	//echo $action;
	//echo $returns;

	$fields = array('method' => $method, 'parameters' => $parameters, 'type' => $type, 'action' => action, 'returns' => $returns);
	$send = json_encode($fields);

	echo json_encode($fields);
	$crl = curl_init();
	//curl_setopt($crl, CURLOPT_URL, "http://web.njit.edu/~hk264/index.php");
	curl_setopt($crl, CURLOPT_URL, "http://web.njit.edu/~rm454/sendQuestions.php");
	curl_setopt($crl, CURLOPT_POST, 1);
	curl_setopt($crl, CURLOPT_POSTFIELDS, $send);
	curl_setopt($crl, CURLOPT_FOLLOWLOCATION, 1);
	
	$c = curl_exec($crl);
	curl_close($crl);
	
	
?>
