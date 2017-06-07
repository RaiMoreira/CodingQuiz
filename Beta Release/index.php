
<?php 

        session_start();

	//include ('header.php');

	include ('logincheck.php');

       ?>
<html>

    <head>
	<link rel="stylesheet" type="text/css" href="studentStyles.css">
        <title>Login Page</title>
        <meta charset="UTF-8">
    </head>

<body>

<div class="signin-form">

	<div class="container">

	<form action="logincheck.php" method="post" id="myForm" class="form-signin">
	<h2 class="form-signin-heading">Online Coding Quiz</h2><hr />
<input type='hidden' name='submitted' id='submitted' value='1' />

	USERNAME<br> <input type="text" name="user" id="username" required><br>
	PASSWORD<br> <input type="password" name="password" id="password" required><br>

	<label class='radio-inline'>
  <input name="Check" class="Check" id='Check' type="radio" 	  	  value="teacher" required />Teacher
  </label>
                        
        <label class='radio-inline'>
        <input name="Check" class="Check" id='Check' type="radio" 		 	 value="student" required />Student 
     </label>
<label class='button'>

                        <input type='submit' name='submit' value='Log In' />

                        </label>

	
	</form>

	</div>
</div>

<div id="ack"></div>

<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
<script type="text/javascript" src="script.js"></script>

</body>
</html> 

<?php

?>