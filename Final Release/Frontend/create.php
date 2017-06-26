<?php
   session_start();
    include('theader.php');
    //include('addQuestion.php');
?>


<?php 
$msg = "";
if(isset($_GET['msg'])){
	$msg = $_GET['msg'];
}
?>

<head>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" ></script>
    <script type="text/javascript">
        //when the webpage has loaded do this
        $(document).ready(function() {  
            //if the value within the dropdown box has changed then run this code            
            $('#num_cat').change(function(){
                //get the number of fields required from the dropdown box
                var num = $('#num_cat').val();                  

                var i = 0; //integer variable for 'for' loop
                var html = ''; //string variable for html code for fields 
                //loop through to add the number of fields specified
                for (i=1;i<=num;i++) {
                    //concatinate number of fields to a variable
                    html += 'Case ' + i + ' (Enter Parameters) ' + ': <input type="text" name="case' + i + '[]" size="2"/> <input type="text" name="case' + i + '[]" size="2"/> <input type="text" name="case' + i + '[]" size="2"/><br/><br>'; 
                }

                //insert this html code into the div with id catList
                $('#catList').html(html);
            });
        }); 
    </script>
</head>
<link rel="stylesheet" href="formstyle.css">
<form action="addQuestion.php" method="POST">

<div class="form-style-6">
<br>
<legend><span class="number">1</span> <strong>Question:</strong></legend>

<textarea name="question" placeholder="Write question here"></textarea>
<br>

<legend><span class="number">2</span> <strong>Please Enter the Number of Test Cases:</strong></legend>

<select id="num_cat" name="num_cat">
            <option value="0">- SELECT -</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <div id="catList"></div>


<legend><span class="number">3</span> <strong>Please enter Method Name:</strong></legend>
<textarea name="Method" placeholder="Write method name here"></textarea>
<br>
<legend><span class="number">4</span> <strong>Please Enter the Number of Parameters:</strong></legend>

 <select name="param">
    <option value="1" <?= $_POST['param'] == 1 ? 'selected' : '' ?>>ONE</option>
    <option value="2" <?= $_POST['param'] == 2 ? 'selected' : '' ?>>TWO</option>
    <option value="3" <?= $_POST['param'] == 3 ? 'selected' : '' ?>>THREE</option>
</select>


  <label>
    <input type="radio" class="option-input radio" name="diff" value="Easy" checked />
    Beginner
  </label>
  <label>
    <input type="radio" class="option-input radio" name="diff" value="Medium" />
    Intermediate
  </label>
  <label>
    <input type="radio" class="option-input radio" name="diff" value="Hard"/>
    Expert
  </label>

<br>
<br>
<br>
<br>

  <input type="submit" value="Submit" />
</div>


</form>

