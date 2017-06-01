<?php
$Username = $_POST['Username'];
$Password = $_POST['Password'];
//echo $Username."   ".$Password;

$url = "https://cp4.njit.edu/cp/home/login";

$st = curl_init();

curl_setopt($st,CURLOPT_URL,$url);
curl_setopt($st,CURLOPT_POST,1);
curl_setopt($st, CURLOPT_POSTFIELDS, "user=".$Username."&pass=".$Password."&uuid=0xACA021");
 curl_setopt($st, CURLOPT_RETURNTRANSFER,1);

$output = curl_exec($st);
$check = curl_getinfo($st,CURLINFO_HTTP_CODE);
curl_close($st);


      if($check == 302) {

      	echo "Successfully  Found in NJIT Database<br>";

$db = curl_init();

        curl_setopt($db, CURLOPT_URL, "https://web.njit.edu/~rm454/cs490/back.php");

        curl_setopt($db, CURLOPT_POST, 1);

        curl_setopt($db, CURLOPT_POSTFIELDS, "Username=".$Username."&Password=".$Password."&hp=".$check);

        curl_setopt($db, CURLOPT_FOLLOWLOCATION, true);

        $outDB = curl_exec($db);
  }


else{
	
	echo "Not  Found in NJIT Database <br>";

$db = curl_init();

        curl_setopt($db, CURLOPT_URL, "https://web.njit.edu/~rm454/cs490/back.php");

        curl_setopt($db, CURLOPT_POST, 1);

        curl_setopt($db, CURLOPT_POSTFIELDS, "Username=".$Username."&Password=".$Password."&hp=".$check);

        curl_setopt($db, CURLOPT_FOLLOWLOCATION, true);

        $outDB = curl_exec($db);

      
}



?>
