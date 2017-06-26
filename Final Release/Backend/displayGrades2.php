<?php
    session_start();
    //include('theader.php');
?>
  <link rel="stylesheet" type="text/css" href="tablestyle.css">
    <h1>Quiz Grades</h1>
    <div class="create-content">
        <form class="choice" action="https://web.njit.edu/~hk264/hkhan/reviewt.php" method="post">
                <table class="grades-table" border="0" cellpadding="0" cellspacing="0" style="table-layout: fixed; border-collapse:collapse;  word-wrap: break-word;">
                    <?php
                        $request = file_get_contents('php://input');
                        $x = json_decode($request);

                        $sizeQuiz = Sizeof($x->Quizzes);
                        if ($sizeQuiz == 0) {
                            echo "Grades have not been released.";
                        }
                    ?>
                    <tr>
                        
                        <th>&nbsp Quiz Name &nbsp</th><br />
                        <th>&nbsp Points Recieved &nbsp</th><br />
                        <th>&nbsp Total Possible Points &nbsp</th><br />
                        <th>&nbsp Grade &nbsp</th><br />
                        <th>&nbsp Student ID &nbsp</th><br />
                    </tr>
                        <?php for($i=0; $i<$sizeQuiz; $i++) {
                            $h= $x->Quizzes[$i]->StudentID;
                            $n = $x->Quizzes[$i]->QuizName;
                            $tc = $x->Quizzes[$i]->TotalCorrect;
                            $tp = $x->Quizzes[$i]->TotalPoints;
                            $g = $x->Quizzes[$i]->Grade;
                    
                        ?>
                    <tr>
                        <td align="left"><pre><?php echo "<input id='choice' name='quizname' type='radio' value=$n>"; echo " ".$n;?></pre></td>
                        
                        <td align="center"><pre><?php echo $tc;?></pre></td>
                        <td align="center"><pre><?php echo $tp;?></pre></td>
                        <td align="center"><pre><?php echo $g;?></pre></td>
                                 <td align="center"><pre><?php echo $h;?></pre></td>
                        
                    </tr>
                    <?php } ?>
                </table>
                <br />
                <br />
                <p></p>
                <input type="submit" value="Review Quiz">
        </form>
    </div>
</div>
</div>

