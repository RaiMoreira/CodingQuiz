<?php

    session_start();

    include('sheader.php');

?>

  <link rel="stylesheet" type="text/css" href="tablestyle.css">
                <table>

                    <?php

                        $request = file_get_contents('php://input');

                        $x = json_decode($request);



                        $sizeQuiz = Sizeof($x->Quiz);
$Name = $x->name;
                    ?>
                    
                       <tr>

                        <th>&nbsp Question Number&nbsp</th><br />

                        <th>&nbsp Question &nbsp</th><br />

                        <th>&nbsp Answer &nbsp</th><br />

                        <th>&nbsp Your Answer &nbsp</th><br />

                        <th>&nbspCorrect/Incorrect &nbsp</th><br />

                        <th>&nbsp Points Recieved &nbsp</th><br />
                          <th>&nbsp Comments &nbsp</th><br />
                          

                    </tr>
                    
                    
                        <?php for($i=0; $i<$sizeQuiz; $i++) {

                            $qn = $x->Quiz[$i]->QuestionNum;

                            $q = $x->Quiz[$i]->Question;

                            $a = $x->Quiz[$i]->Answer;

                            $ya = $x->Quiz[$i]->YourAnswer;

                            $ci = $x->Quiz[$i]->CorrInc;

                            $pr = $x->Quiz[$i]->PointRec;
                            
                            $pt = $x->Quiz[$i]->Points;
                            
                            $co = $x->Quiz[$i]->Comment;

                        ?>

                    <tr>

                        <td align="left"><pre><?php echo $qn;?></pre></td>

                        <td align="left"><pre><?php echo $q;?></pre></td>

                        <td align="left"><pre><?php echo $a;?></pre></td>

                        <td align="left"><pre><?php echo $ya;?></pre></td>

                        <td align="left"><pre><?php echo $ci;?></pre></td>

                        <td align="center"><pre><?php echo $pr."/".$pt;?></pre></td>
                        <td align="left"><pre><?php echo $co;?></pre></td>


                    </tr>
                    

                    <?php } ?>

                </table>
                

                



<?php
  

?>