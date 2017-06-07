<?php

    $con = mysql_connect("sql1.njit.edu","hk264","1234");

    if(!$con) {

        die('Could not connect: ' . mysql_error());

    }



    mysql_select_db("hk264", $con);

    

    $request = file_get_contents('php://input');

    $recieve = json_decode($request);

    


   $Method = $recieve->method;

  $Parameters= $recieve->parameters;

  $Type= $recieve->type;

  $Action = $recieve->action;

  $Answer = $recieve->returns;

    
$Question = "Create  a method called ".$Method." with parameters ".$Parameters." that are of type ".$Type." that perform the following operation :".$Action." , and returns ".$Answer.".";


   $createOE = "INSERT INTO OpenEnded (Question,Answer) VALUES ('$Question', '$Answer')";

        $exec2 = mysql_query($createOE, $con);

      print '<script type="text/javascript">'; 

            print 'alert("Question Added Successfully.")';

            print '</script>'; 
            
            print '<script type="text/javascript"> window.location = "create.php"</script>';
?>