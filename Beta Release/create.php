<?php
   session_start();
    include('teacherHeader.php');
    //include('addQuestion.php');
?>
<?php 
$msg = "";
if(isset($_GET['msg'])){
	$msg = $_GET['msg'];
}
?>
 <link rel="stylesheet" href="studentStyles.css">
<div class="form-style-5">
<br>
<br>

<legend><span class="number">1</span> Create a New Question</legend>
<br>


	<form action="addQuestion.php" method="POST">
	<label for="method">Write the name of the method below:</label>
	<input type="text" name="method" placeholder="eg.calcSomthing">
	<label for="parameters">Write the parameters names below:</label>
	<input type="text" name="parameters" placeholder="eg.a and b">
	<label for="parameters">Write the type of parameters below:</label>
	<input type="text" name="type" placeholder="eg.int">
	<label for="parameters">Write the action or what the method calculates below:</label>
	<input type="text" name="action" placeholder="eg.a * b">
	<label for="parameters">Write the appropriate return value below:</label>
	<input type="text" name="returns" placeholder="eg.25">
	<label for="parameters">Write the appropriate answer below:</label>
  	<textarea name="answer" rows="7" cols="30">Public static int CalcSomthing(int a, int b){
  	result = a * b 
  	return result; 
  	}</textarea>
  <br>
	<input type="submit" value="Submit">
	</form>

</div>