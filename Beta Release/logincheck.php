<?php

 if(isset($_POST['submit'])){

		session_start();

		$crl = curl_init();

		$Username=$_POST['user'];

		$Password=$_POST['password'];

		$Check = $_POST['Check'];

	    
	       $fields = array('Username' => $Username, 'Password' => $Password, 'Check' => $Check);

		$send = json_encode($fields);

		

		//curl_setopt($crl, CURLOPT_URL, "http://web.njit.edu/~ovl2/CS490/Middle/middlelogin.php");

		curl_setopt($crl, CURLOPT_URL, "https://web.njit.edu/~hk264/CS490/middlelogin.php");

		curl_setopt($crl, CURLOPT_POST, 1);

		curl_setopt($crl, CURLOPT_POSTFIELDS, $send);

		curl_setopt($crl, CURLOPT_FOLLOWLOCATION, 1);

		

		$c = curl_exec($crl);

		curl_close($crl);

	}//end submission	


?>