<?php

    session_start();

    //include('theader.php');



	     $con = mysql_connect("sql1.njit.edu","hk264","1234");

    if(!$con) {

        die('Could not connect: ' . mysql_error());

    }



    mysql_select_db("hk264", $con);


    

   $request = file_get_contents('php://input');

    $recieve = json_decode($request);

    

    $name = $recieve->QuizName;


 
 $release = mysql_query("UPDATE grades set Released = 'Released' WHERE QuizName= '$name'");



    echo $name." Grades have been released.";

?>