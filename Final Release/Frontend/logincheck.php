<?php

 if(isset($_POST['submit'])){

		session_start();

		$crl = curl_init();

		$Username=$_POST['user'];

		$Password=$_POST['password'];


	    
	       $fields = array('Username' => $Username, 'Password' => $Password);

		$send = json_encode($fields);


		curl_setopt($crl, CURLOPT_URL, "https://web.njit.edu/~mo75/hkhan/middlelogin.php");

		curl_setopt($crl, CURLOPT_POST, 1);

		curl_setopt($crl, CURLOPT_POSTFIELDS, $send);

		curl_setopt($crl, CURLOPT_FOLLOWLOCATION, 1);

		

		$c = curl_exec($crl);

		curl_close($crl);

	}	


?>
