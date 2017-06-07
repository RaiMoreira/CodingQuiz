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

    

    //print_r($Quiz);


    $sizeOE = Sizeof($Quiz->OpenEnded);

    $Name = $Quiz->QuizName;

    $Start = $Quiz->StartDate;

    $End = $Quiz->EndDate;



    $insertQuiz = "INSERT INTO Quizzes (QuizName, StartDate, EndDate) VALUES ('$Name', '$Start', '$End')";

    $exec = mysql_query($insertQuiz, $con);

    

    

    $quizID = mysql_query("SELECT ID FROM Quizzes WHERE QuizName = '$Name'");

    $info = mysql_fetch_assoc($quizID);

    $id = $info['ID'];



    //$create = mysql_query("CREATE TABLE `ovl2_proj`.`$Name` (`Question` TEXT,`Opt1` VARCHAR(255),`Opt2` VARCHAR(255),`Opt3` VARCHAR(255),`Opt4` VARCHAR(255),`Answer` VARCHAR(255),`QuizID` INT(255))");
 echo $Name;
    

    $create = mysql_query("CREATE TABLE `hk264`.`$Name` (`Question` TEXT NOT NULL,`Answer` VARCHAR(255) NOT NULL, `QuestionNum` INT(255) NOT NULL AUTO_INCREMENT, `QuizID` INT NOT NULL, PRIMARY KEY (`QuestionNum`))");



    for ($i=0; $i<=$sizeOE; $i++) {

        $num = $i;

       $sql3 = mysql_query("SELECT Question, Answer FROM OpenEnded WHERE QuestionNum = '$num'");

        $info3 = mysql_fetch_assoc($sql3);

        

        $Ques = $info3['Question'];

        //$Opt1 = $info3['Opt1'];

        //$Opt2 = $info3['Opt2'];

        $Ansr = $info3['Answer'];

        

        //echo $Ques;

        $insOE = "INSERT INTO $Name (Question, Answer, QuizID) VALUES ('$Ques', '$Ansr', '$id')";

        $exec3 = mysql_query($insOE, $con);

    } 


    $quz = mysql_query("SELECT QuestionNum, Question FROM `$Name`");

    $QUZquestions = array();



    

    while($q = mysql_fetch_assoc($quz)) {

            $QUZquestions[] = $q;

    }

    
   

  /*  $send = json_encode(array('QuizName' => $Name, 'Questions' => $QUZquestions));

    //echo $send;

    



    $crl = curl_init();

    //curl_setopt($crl, CURLOPT_URL, "http://web.njit.edu/~ovl2/CS490/login/student/takeQuiz.php");

    curl_setopt($crl, CURLOPT_URL, "http://web.njit.edu/~ovl2/CS490/login/teacher/quizPoints.php");

    curl_setopt($crl, CURLOPT_POST, 1);

    curl_setopt($crl, CURLOPT_POSTFIELDS, $send);

    curl_setopt($crl, CURLOPT_FOLLOWLOCATION, 1);

    

    $outputDB = curl_exec($crl);

    curl_close($crl); 

    //Echo "Quiz Created."
*/
?>