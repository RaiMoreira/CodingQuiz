<!DOCTYPE HTML>
<?php

    session_start();

    include('theader.php');

?>

<section class="container">

  <script src="../hkhan/js/function.js"></script>
  <script src="//code.jquery.com/jquery-latest.min.js"></script>

  <link rel="stylesheet" type="text/css" href="splitscreen.css">
             
    <div class="left-half">

    <article>
    
        <h1>Question Bank</h1>
  <form class="choice" action="../hkhan/addQuiz.php" method="post">
        <table class="create-quiz" border="auto" cellpadding="auto" cellspacing="auto">
            <div class="create-content">
                    
                <button type="button" onclick="choicetype('E','M','H')" return false><strong>Easy</strong></button>
                <button type="button" onclick="choicetype('M','E','H')" return false><strong>Medium</strong></button>
                <button type="button" onclick="choicetype('H','E','M')" return false><strong>Hard</strong></button>
                      
            
            <button id="myButton" class="float-left submit-button" >All Questions</button>  
 
            </div>
        </table>
                
                
                 <?php
                 

                        $request = file_get_contents('php://input');

                        $x = json_decode($request);

                        $sizeE = Sizeof($x->Easy);

                        $sizeM = Sizeof($x->Medium);

                        $sizeH = Sizeof($x->Hard);

                    ?>

                
<div class="content-create" id="E">
<table>
        <tr><strong>Easy</strong></tr>

            <?php for($i=0; $i<$sizeE; $i++) {

                 $n = $x->Easy[$i]->QuestionNum;

                 $q = $x->Easy[$i]->Question;

                ?>

        <tr>
<ul id="select1">
  <li>
    
            <?php echo "<input id='choice' name='easy[]' type='checkbox' value='$q'>"; echo " "." "; echo $q; ?>

        </tr>

        <?php } ?>

  </li>
</ul>
        
</table>
    </div>

            
<div class="content-create" id="M">
    <table>
        <tr><strong>Medium</strong></tr>

            <?php for($i=0; $i<$sizeM; $i++) {

                 $n = $x->Medium[$i]->QuestionNum;

                 $q = $x->Medium[$i]->Question;

                ?>

<tr>
    <ul id="select1">
        <li>
            <?php echo "<input id='choice' name='medium[]' type='checkbox' value='$q'>"; echo " "." "; echo $q; ?>

</tr>
        </li>
    </ul>
        <?php } ?>
    </table>
 </div>



    <div class="content-create" id="H">
<table>
        <tr><strong>Hard</strong></tr>

            <?php for($i=0; $i<$sizeH; $i++) {

                 $n = $x->Hard[$i]->QuestionNum;

                 $q = $x->Hard[$i]->Question;

                ?>

        <tr>
<ul id="select1">
  <li>
            <?php echo "<input id='choice' name='hard[]' type='checkbox' value='$q'>"; echo " "." "; echo $q; ?>

        </tr>
  </li>
</ul>
        <?php } ?>
</table>
    <a href="#" id="add">add</a>
    </div>


    </div>

    </div>
    </article>

    </div>

  <div class="right-half">
    <br><br><br>
        <h1>New Quiz</h1>
    <article>


<ul id="select2">
  <li>

  
  
  
  
  </li>
</ul>


<a href="#" id="remove">remove</a>


    </article>

          
               Quiz Name: <input type="text" name="quizName" autocomplete="on" required/>
               Start Date: <input type="date" name="startDate" placeholder="yyyy-mm-dd" />
               End Date: <input type="date" name="endDate" placeholder="yyyy-mm-dd" /> 

                 <center>
                <input type="hidden" value="CQ" name="type">

                <input type="submit" value="Create a Quiz"></center>
        </form>



  </div>

</section>




<script type="text/javascript">
    document.getElementById("myButton").onclick = function () {
        location.href = "getquestions.php";
    };
</script>

<script type="text/javascript">
$('#add').click(function() {
  return !$('#select1 li :checked').closest('li').clone().appendTo('#select2');
  
});
$('#remove').click(function() {
  return !$('#select2 li :checked').closest('li').remove();
});
</script>
<