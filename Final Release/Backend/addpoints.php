<?php

    session_start();

    //include('theader.php');

?>



<?php

     $con = mysql_connect("sql1.njit.edu","hk264","1234");

    if(!$con) {

        die('Could not connect: ' . mysql_error());

    }



    mysql_select_db("hk264", $con);



    

    $Request = file_get_contents('php://input');

    $Quiz = json_decode($Request);

    

    

    $Name = $Quiz->QuizName;

    $size = Sizeof($Quiz->Points);



    for ($i=0; $i<$size; $i++) {

        $qus = $i + 1;

        $x = $Quiz->Points[$i];   

        $addPoints = mysql_query("UPDATE $Name set Points = '$x' WHERE QuestionNum= '$qus'");

    }

    
 print '<script type="text/javascript">'; 

            print 'alert("Quiz Created.")';

            print '</script>'; 
            
            print '<script type="text/javascript"> window.location = "getquestions.php"</script>'; 


?>