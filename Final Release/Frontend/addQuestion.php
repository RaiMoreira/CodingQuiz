<?php

	//session_start();

	     $con = mysql_connect("sql1.njit.edu","hk264","1234");

    if(!$con) {

        die('Could not connect: ' . mysql_error());

    }



    mysql_select_db("hk264", $con);


$Question = $_POST['question'];
    
$Difficulty = $_POST['diff'];

$method = $_POST['Method'];

$Param = $_POST['param'];

$Case1 = $_POST['case1'];
$Case2 = $_POST['case2'];
$Case3 = $_POST['case3'];
$Case4 = $_POST['case4'];

for ($i = 0; $i < 3; $i++) {
    ${"t{$i}"} = $Case1[$i];  // use double quotes between braces
}

for ($i = 0; $i < 3; $i++) {
    ${"p{$i}"} = $Case2[$i];  // use double quotes between braces
}
for ($i = 0; $i < 3; $i++) {
    ${"v{$i}"} = $Case3[$i];  // use double quotes between braces
}
for ($i = 0; $i < 3; $i++) {
    ${"g{$i}"} = $Case4[$i];  // use double quotes between braces
}

$T1 = $t0.",".$t1.",".$t2;
$P1 = $p0.",".$p1.",".$p2;
$V1 = $v0.",".$v1.",".$v2;
$G1 = $g0.",".$g1.",".$g2;




$createOE = "INSERT INTO openended (Question,Difficulty,Method,Parameters,TestC1,TestC2,TestC3,TestC4) VALUES ('$Question','$Difficulty','$method','$Param','$T1','$P1','$V1','$G1')";

        $exec2 = mysql_query($createOE, $con);

      print '<script type="text/javascript">'; 

            print 'alert("Question Added Successfully.")';

            print '</script>'; 
            
            print '<script type="text/javascript"> window.location = "create.php"</script>'; 

?>


