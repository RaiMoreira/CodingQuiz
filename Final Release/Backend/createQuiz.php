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


   $sizeE = Sizeof($Quiz->Easy);

    $sizeM = Sizeof($Quiz->Medium);

    $sizeH = Sizeof($Quiz->Hard);
   
    $Name = $Quiz->QuizName;

    $Start = $Quiz->StartDate;

    $End = $Quiz->EndDate;

    $QuizCheck1 = $Quiz->Easy;
    $QuizCheck2 = $Quiz->Medium;
    $QuizCheck3 = $Quiz->Hard;
    
//echo $QuizCheck1[0];

//echo $QuizCheck2[0];


    $insertQuiz = "INSERT INTO quizzes (QuizName, StartDate, EndDate) VALUES ('$Name', '$Start', '$End')";

    $exec = mysql_query($insertQuiz, $con);

    

    

    $quizID = mysql_query("SELECT ID FROM quizzes WHERE QuizName = '$Name'");

    $info = mysql_fetch_assoc($quizID);

    $id = $info['ID'];



    $create = mysql_query("CREATE TABLE `hk264`.`$Name` (`Question` TEXT NOT NULL,`Answer` VARCHAR(255) NOT NULL,`YourAnswer` VARCHAR(255) NOT NULL,`Points` INT(255) NOT NULL  ,
        `PointRec` TEXT NOT NULL,`CorrInc` TEXT NOT NULL,`Comment` VARCHAR(255) NOT NULL,`QuestionNum` INT(255) NOT NULL AUTO_INCREMENT, `QuizID` INT NOT NULL, PRIMARY KEY (`QuestionNum`))");



    for ($i=0; $i<$sizeE; $i++) {

       $num = $QuizCheck1[$i];
      // echo $num;

       $sql3 = mysql_query("SELECT Question, Answer FROM openended WHERE Question = '$num'");

        $info3 = mysql_fetch_assoc($sql3);

        
        $Ques = $info3['Question'];

        //$Opt1 = $info3['Opt1'];

        //$Opt2 = $info3['Opt2'];

        $Ansr = $info3['Answer'];



        $insOE = "INSERT INTO $Name (Question, Answer, QuizID) VALUES ('$Ques', '$Ansr', '$id')";
            $exec3 = mysql_query($insOE, $con);
         } 

 for ($i=0; $i<$sizeM; $i++) {

       $num = $QuizCheck2[$i];
      // echo $num;

       $sql3 = mysql_query("SELECT Question, Answer FROM openended WHERE Question = '$num'");

        $info3 = mysql_fetch_assoc($sql3);

        
        $Ques = $info3['Question'];

        //$Opt1 = $info3['Opt1'];

        //$Opt2 = $info3['Opt2'];

        $Ansr = $info3['Answer'];



        $insOE = "INSERT INTO $Name (Question, Answer, QuizID) VALUES ('$Ques', '$Ansr', '$id')";
            $exec3 = mysql_query($insOE, $con);
         } 

 for ($i=0; $i<$sizeH; $i++) {

       $num = $QuizCheck3[$i];
      // echo $num;

       $sql3 = mysql_query("SELECT Question, Answer FROM openended WHERE Question = '$num'");

        $info3 = mysql_fetch_assoc($sql3);

        
        $Ques = $info3['Question'];

        //$Opt1 = $info3['Opt1'];

        //$Opt2 = $info3['Opt2'];

        $Ansr = $info3['Answer'];



        $insOE = "INSERT INTO $Name (Question, Answer, QuizID) VALUES ('$Ques', '$Ansr', '$id')";
            $exec3 = mysql_query($insOE, $con);
         } 



   $quz = mysql_query("SELECT QuestionNum, Question FROM `$Name`");

    $QUZquestions = array();



    

    while($q = mysql_fetch_assoc($quz)) {

            $QUZquestions[] = $q;

    }

    

    $send = json_encode(array('QuizName' => $Name, 'Questions' => $QUZquestions));



    $crl = curl_init();

    
    curl_setopt($crl, CURLOPT_URL, "https://web.njit.edu/~hk264/hkhan/quizPoints.php");

    curl_setopt($crl, CURLOPT_POST, true);

    curl_setopt($crl, CURLOPT_POSTFIELDS, $send);

    curl_setopt($crl, CURLOPT_FOLLOWLOCATION, 1);

    

    $outputDB = curl_exec($crl);

    curl_close($crl); 

    //Echo "Quiz Created."

?>