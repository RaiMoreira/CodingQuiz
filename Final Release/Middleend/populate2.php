<?php

$con = mysql_connect("sql1.njit.edu","hk264","1234");

if(!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("hk264", $con);
$Request = file_get_contents('php://input');
$Quiz = json_decode($Request);
$feedback = $x->FeedBack;
$OE = $Quiz->OpenEnded;
$User = $Quiz ->User;
$Name =$Quiz->Quizname;
$ans = $Quiz->OpenEnded;


$parameter = mysql_query("select Opt1 from $Name where Opt2 = '' AND Opt3 = '' AND Opt4 = ''");
$info = mysql_fetch_assoc($parameter);
$para = $info[('Opt1')];
$output = $OE;
$ok = $OE[0];

$method_pattern = '/([a-zA-Z]+ \()|([a-zA-Z]+\()/';
    preg_match($method_pattern, $ok, $method);
    $method = trim($method[0], '(');
    //echo $method;


$file = "MyClass.java";
$file2 = "ending.txt";
$file3 ="method.txt";
file_put_contents($file3, $method, FILE_APPEND);
$error_output = "";
$java_output = "";


$newadd =" public static void main (String[] args) { int a=2; int b=5; $method(a,b);}";
file_put_contents($file, $newadd, FILE_APPEND);
file_put_contents($file, $ok, FILE_APPEND);
file_put_contents($file, "}", FILE_APPEND);


exec('javac '.$file,$output,$resultCode);
//echo exec("java -cp . MyClass", $output,$resultCode); 

$filetest = "MyClass.class";
if(file_exists($filetest) != true) {
    $error_output = "Compilation error";
    $java_output = $error_output;
    //echo $java_output;
}

if(file_exists($filetest) == true) {
    $good_output = "compile successful";
    $java_output = $good_output;
    //echo $java_output;
}


$x->FeedBack = $java_output;
$y = json_encode($x);
$crl = curl_init();
curl_setopt($crl, CURLOPT_URL, "https://web.njit.edu/~hk264/hkhan/grade.php");
curl_setopt($crl, CURLOPT_POST, 1);
curl_setopt($crl, CURLOPT_POSTFIELDS, $y);
curl_setopt($crl, CURLOPT_FOLLOWLOCATION, 1);
$outputDB = curl_exec($crl);
curl_close($crl);
    
?>