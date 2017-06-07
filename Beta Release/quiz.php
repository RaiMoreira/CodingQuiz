<?php
    session_start();
    include('theader.php');
                        
    
?>
    <script src="../js/function.js"></script>
    <div class="create-content">
        <h1>Question Bank</h1>
            <form class="choice" action="addQuiz.php" method="post">
               Quiz &nbspName: <input type="text" name="quizName" autocomplete="on" required/><br />
               Start  &nbspDate: <input type="date" name="startDate" placeholder="yyyy-mm-dd" /><br />
               End    &nbspDate: <input type="date" name="endDate" placeholder="yyyy-mm-dd" /><br />
                <table class="create-quiz" border="auto" cellpadding="auto" cellspacing="auto">
                <div class="create-content">
                        <h2>What question would you like to add into Quiz?</h2>
                        
                </div>
                </table>
                    <?php
                         $request = file_get_contents('php://input');
                        $x = json_decode($request);

                        $sizeOE = Sizeof($x->OpenEnded);
                    ?>
                   
                    <div class="content-create" id="OE">
                    <tr>
                        <th>Open-Ended Questions</th>
                    </tr>
                        <?php for($i=0; $i<$sizeOE; $i++) {
                           
                            $q = $x->OpenEnded[$i]->Question;
                            ?>
                    <tr>
                        <td align=left><pre><?php echo "<input id='choice' name='openended[]' type='checkbox' value=$q>"; echo $q; ?></pre></td>
                    </tr>
                    <?php } ?>
                    </div>
                <p></p>
               
                <input type="hidden" value="CQ" name="type">
                <input type="submit" value="Create a Quiz">
               
            </form>
    </div>
    </div>
<?php
    //include('../footer.html');
?>