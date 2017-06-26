<?php

    session_start();

    //include('sheader.php');

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

            <form class="quizSheet" action="submitQuiz.php" method="post">

                

                  <table id="$N" class="create-quiz" border="1" cellpadding="1" cellspacing="1">
       <tr>Enter UCID: <input type="text" name="user" id="UCID" required>
    
</tr>

                    <?php


                            $sizeOE = Sizeof($Quiz->OpenEnded);

                    ?>

                    

                    <table id="quizname" border="1" cellpadding="1" cellspacing="1">

                        <?php echo "<input id='name' name='quizname' type='text' value=$Name size='5' readonly>"; ?>

                    </table>



                    <tr>

                        <th><br><strong>Open-Ended Question(s)</strong></th>

                    </tr>
                 <?php   
                     for($i=0; $i<$sizeOE; $i++) {
   $J = $Quiz->OpenEnded[$i]->Question;
   $Quez[]=$J;
 ?>
   <input type=text value="<?php echo $Quez[$i]  ?>" name="Que[]"  style="display:none">
   
   
  <?php }
   ?>

                        <?php for($i=0; $i<$sizeOE; $i++) {

                            $q = $Quiz->OpenEnded[$i]->Question;

                            $n= $Quiz->OpenEnded[$i]->QuestionNum;
                            
                            $p= $Quiz->OpenEnded[$i]->Points;

                        ?>



                    <tr>

                        <td align=left><pre><?php echo $n.". (Points:".$p."):" ?> <?php echo "<strong>".$q."</strong>"." :" ?></pre></td>

                        <textarea name="openended[]" value="Opt1" style="width:400px;height:200px;" placeholder="Enter your answer here..."></textarea>

                    </tr>

                    <?php } ?>

                </table>

                <p></p>

                <input type="hidden" value="CQ" name="type">
                

                <input type="submit" value="Submit Quiz">

            </form>

    </div>

<?php




?> 

