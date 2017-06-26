<?php
    $request = file_get_contents('php://input');
    
    $loginDB = curl_init();
    curl_setopt($loginDB, CURLOPT_URL, "https://web.njit.edu/~hk264/hkhan/backlogin.php");
    curl_setopt($loginDB, CURLOPT_POST, 1);
    curl_setopt($loginDB, CURLOPT_POSTFIELDS, $request);
    curl_setopt($loginDB, CURLOPT_FOLLOWLOCATION, 1);
    
    $outLoginDB = curl_exec($loginDB);
    curl_close($loginDB);  
?>

 