<?php

    session_start();

    include('theader.php');

?>

<?php

    $con = mysql_connect("sql1.njit.edu","hk264","1234");

    if(!$con) {

        die('Could not connect: ' . mysql_error());

    }



    mysql_select_db("hk264", $con);

   

    $request = file_get_contents('php://input');

    $recieve = json_decode($request);

    

    $User = $recieve->Username;

    $Pass = $recieve->Password;

    $Check = $recieve->Check;

    

   if ($Check == 'teacher') {

        

        $sql = mysql_query("SELECT COUNT(*) FROM Teacher WHERE UserT = '$User' AND PassT = '$Pass'");

        $info = mysql_fetch_assoc($sql);

        $ver = $info['COUNT(*)'];

    

        if ($ver == 1) {

            session_start();

            $_SESSION['UserTC'] = $User;

            

            print '<script type="text/javascript"> window.location = "teacher/teacher.php"</script>';

        } 

        else {

            

            //print '<div class="alert alert-danger"><strong>Bad Login</strong> Username or password is incorrect.</div>';

            print '<script type="text/javascript"> window.location = "login.php"</script>';



            /*print '<script type="text/javascript">'; 

            print 'alert("Invalid Username or Password")';

            print '</script>'; */

        } 

    }

    

   if ($Check == 'student') {

        

        $sql = mysql_query("SELECT COUNT(*) FROM Student WHERE UserST = '$User' AND PassST = '$Pass'");

        $info = mysql_fetch_assoc($sql);

        $ver = $info['COUNT(*)'];

        

        if ($ver == 1) {

            session_start();

            $_SESSION['UserST'] = $User;

            

            print '<script type="text/javascript"> window.location = "student.php"</script>';

        }

        else {

            //header ("Location: http://web.njit.edu/~ic35/CS490/login/login.php");

            print '<script type="text/javascript"> window.location = "login.php"</script>';

            //echo "Invalid Login";

        } 

    }

?>