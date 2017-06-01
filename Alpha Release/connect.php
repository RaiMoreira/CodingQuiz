<?php


	$Username=$_POST['user'];

	$Password=$_POST['password'];



	$crl = curl_init();


	curl_setopt($crl, CURLOPT_URL, "https://web.njit.edu/~rm454/cs490/middlelogin.php");

	curl_setopt($crl, CURLOPT_POST, 1);

	curl_setopt($crl, CURLOPT_POSTFIELDS, "Username=".$Username."&Password=".$Password);

	curl_setopt($crl, CURLOPT_FOLLOWLOCATION, 1);

    

	$c = curl_exec($crl);

	curl_close($crl); 


?>
