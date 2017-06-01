<?php
$conn = mysql_connect("sql1.njit.edu","hk264","1234");
if(!$conn)
{
	die('Could not connect: ' . mysql_server());
}


mysql_select_db("hk264",$conn);

$User = $_POST['Username'];
$Pass = $_POST['Password'];
$CH = $_POST['hp'];

//echo $User."   ".$Pass."   ".$CH;

$sql = mysql_query("SELECT COUNT(*) FROM login WHERE user = '$User' AND pass = '$Pass'");

    $info = mysql_fetch_assoc($sql);

    $ver = $info['COUNT(*)'];

        if($ver == 1) {

            echo "User Found in Database.";

        }

        else{

            echo "User Not In Database."; 

  }    


?>
