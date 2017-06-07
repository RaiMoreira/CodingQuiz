<?php
    session_start;
    include('studentHeader.php');
?>
    <script type="text/javascript">
        window.onload=function date(){
        var now=new Date();
        var x = document.getElementById("date");
        x.innerHTML=now.toUTCString();
        }
    </script>
    
    
    <div class="take-quiz">
            <?php
                $Request = file_get_contents('php://input');
                $Quiz = json_decode($Request);
                
                $Name = $Quiz->QuizName;
                      
            ?>
        <h1><?php echo $Name; ?> </h1>
        <p id="date"></p>
        <div id="countdown">
            Timer Countdown: <input type="text" id="timer"/>
            <script type="text/javascript">
                var timer = new Countdown();
                timer.init();
            </script>
        </div>
        <p></p>
        <p></p>
            <form class="quizSheet" action="http://web.njit.edu/~rm454/submitQuiz.php" method="post">
                
                  <table id="$N" class="create-quiz" border="1" cellpadding="1" cellspacing="1">
                    <?php
                            $sizeOE = Sizeof($Quiz->OpenEnded);
                    ?>
                    
                    <table id="quizname" border="1" cellpadding="1" cellspacing="1">
                        <?php echo "<input id='name' name='quizname' type='text' value=$Name size='5' readonly>"; ?>
                    </table>

                    <tr>
                        <th><b>Open-End</b></th>
                    </tr>
                        <?php for($i=0; $i<$sizeOE; $i++) {
                            $q = $Quiz->OpenEnded[$i]->Question;
                            $n= $Quiz->OpenEnded[$i]->QuestionNum;
                        ?>
                    <tr>
                        <td align=left><pre><?php echo $n ?> <?php echo $q ?></pre></td>
                        <textarea name="openended" value="Opt1" style="width:600px; min-height: 300px;" placeholder="Enter your answer here..."></textarea>
                    </tr>
                    <?php } ?>
                </table>
                <p></p>
                <P></P>
                <input type="hidden" value="CQ" name="type">
                <input type="submit" value="Submit Quiz">
            </form>
            <br />
    </div>
    </div>
    </div>
    </div>

