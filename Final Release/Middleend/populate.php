<?php

$con = mysql_connect("sql1.njit.edu","hk264","1234");

if(!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("hk264", $con);
$Request = file_get_contents('php://input');
$Quiz = json_decode($Request);
$OE = $Quiz->OpenEnded;
$User = $Quiz ->User;
$Name =$Quiz->Quizname;
$ans = $Quiz->OpenEnded;
$Questions =$Quiz->Ques;

//print_r($Questions);
$SizeOE =Sizeof($ans);



//echo $SizeOE;
for($i=0;$i<$SizeOE;$i++){

$Que1=$Questions[$i];



$John = mysql_query("SELECT TestC1,TestC2,TestC3,TestC4 FROM openended WHERE Question ='$Que1'");//Captures Test Cases from Database

$info3 = mysql_fetch_assoc($John);

//print_r($info3);


$info4 = array_diff($info3, array(',,'));//removes empty test cases
//print_r($info4);





if(isset($info4['TestC1'])){
$Test1= $info4['TestC1'];
$Test1 = explode(",",$Test1);
//print_r($Test1);
$Getit = mysql_query("SELECT Method,Parameters FROM openended WHERE Question ='$Que1'");
$bring =mysql_fetch_assoc($Getit);
$yo = $ans[$i];
//echo $yo
$file="MyClass.java";
file_put_contents($file, $yo, FILE_APPEND);
$file2 = "public static void main(String[]args) {";
file_put_contents($file, $file2, FILE_APPEND);
$Meth = $bring[Method];
$Param = $bring[Parameters];
//echo $Meth;
//echo$Param;

if(($Test1[0])>0 && ($Test1[0])<100000000000){
	echo " ";
}else{
$yo2='"'.$Test1[0].'"';
$Test1[0]=$yo2;
}
if(($Test1[1])>0 && ($Test1[1])<100000000000){
	echo " ";
}else{
$yo2='"'.$Test1[1].'"';
$Test1[1]=$yo2;
}
if(($Test1[2])>0 && ($Test1[2])<100000000000){
	echo " ";
}else{
$yo2='"'.$Test1[2].'"';
$Test1[2]=$yo2;
}

//echo $Test1[0];
//echo $Test1[1];
//echo $Test1[2];

if($Param == 1){
$yo2 =("int TestCase1; TestCase1= ".$Meth."(".$Test1[0].");"); }
elseif($Param == 2){
$yo2 =("int TestCase1; TestCase1 = ".$Meth."(".$Test1[0].",".$Test1[1].");"); }
else{
$yo2 =("int TestCase1; TestCase1 = ".$Meth."(".$Test1[0].",".$Test1[1].",".$Test1[2].");"); }

file_put_contents($file, $yo2, FILE_APPEND);

$file3="System.out.println(TestCase1);}}";

file_put_contents($file, $file3, FILE_APPEND);

exec("javac MyClass.java");

$filetest = "MyClass.class";

if(file_exists($filetest) == true){
echo"Congrats your method compiled";
}else{
echo "Compilation failed, check code for errors";}


$result = shell_exec("java MyClass");
 

echo $result."  ";

exec("cp -rf ./restore/MyClass.java ."); 

exec("rm MyClass.class"); 
}
else{
echo "TestC1 not set";}





if(isset($info4['TestC2'])){
$Test2= $info4['TestC2'];
$Test2 = explode(",",$Test2);
//print_r($Test2);
$Getit = mysql_query("SELECT Method,Parameters FROM openended WHERE Question ='$Que1'");
$bring =mysql_fetch_assoc($Getit);
$yo = $ans[$i];
//echo $yo
$file="MyClass.java";
file_put_contents($file, $yo, FILE_APPEND);
$file2 = "public static void main(String[]args) {";
file_put_contents($file, $file2, FILE_APPEND);
$Meth = $bring[Method];
$Param = $bring[Parameters];
//echo $Meth;
//echo$Param;

if(($Test2[0])>0 && ($Test2[0])<100000000000){
	echo "";
}else{
$yo2='"'.$Test2[0].'"';
$Test2[0]=$yo2;
}
if(($Test2[1])>0 && ($Test2[1])<100000000000){
	echo "";
}else{
$yo2='"'.$Test2[1].'"';
$Test2[1]=$yo2;
}
if(($Test2[2])>0 && ($Test2[2])<100000000000){
	echo "";
}else{
$yo2='"'.$Test2[2].'"';
$Test2[2]=$yo2;
}

//echo $Test2[0];
//echo $Test2[1];
//echo $Test2[2];

if($Param == 1){
$yo2 =("int TestCase2; TestCase2= ".$Meth."(".$Test2[0].");"); }
elseif($Param == 2){
$yo2 =("int TestCase2; TestCase2 = ".$Meth."(".$Test2[0].",".$Test2[1].");"); }
else{
$yo2 =("int TestCase2; TestCase2 = ".$Meth."(".$Test2[0].",".$Test2[1].",".$Test2[2].");"); }

file_put_contents($file, $yo2, FILE_APPEND);

$file3="System.out.println(TestCase2);}}";

file_put_contents($file, $file3, FILE_APPEND);

exec("javac MyClass.java");

$result = shell_exec("java MyClass");
 

echo $result;

exec("cp -rf ./restore/MyClass.java ."); 

exec("rm MyClass.class"); 
}
else{
echo "TestC2 not set";}





if(isset($info4['TestC3'])){
$Test3= $info4['TestC3'];
$Test3 = explode(",",$Test3);
//print_r($Test3);
$Getit = mysql_query("SELECT Method,Parameters FROM openended WHERE Question ='$Que1'");
$bring =mysql_fetch_assoc($Getit);
$yo = $ans[$i];
//echo $yo
$file="MyClass.java";
file_put_contents($file, $yo, FILE_APPEND);
$file2 = "public static void main(String[]args) {";
file_put_contents($file, $file2, FILE_APPEND);
$Meth = $bring[Method];
$Param = $bring[Parameters];
//echo $Meth;
//echo$Param;

if(($Test3[0])>0 && ($Test3[0])<100000000000){
	echo "";
}else{
$yo2='"'.$Test3[0].'"';
$Test3[0]=$yo2;
}
if(($Test3[1])>0 && ($Test3[1])<100000000000){
	echo "";
}else{
$yo2='"'.$Test3[1].'"';
$Test3[1]=$yo2;
}
if(($Test3[2])>0 && ($Test3[2])<100000000000){
	echo "";
}else{
$yo2='"'.$Test3[2].'"';
$Test3[2]=$yo2;
}

//echo $Test3[0];
//echo $Test3[1];
//echo $Test3[2];

if($Param == 1){
$yo2 =("int TestCase3; TestCase3= ".$Meth."(".$Test3[0].");"); }
elseif($Param == 2){
$yo2 =("int TestCase3; TestCase3 = ".$Meth."(".$Test3[0].",".$Test3[1].");"); }
else{
$yo2 =("int TestCase3; TestCase3 = ".$Meth."(".$Test3[0].",".$Test3[1].",".$Test3[2].");"); }

file_put_contents($file, $yo2, FILE_APPEND);

$file3="System.out.println(TestCase3);}}";

file_put_contents($file, $file3, FILE_APPEND);

exec("javac MyClass.java");

$result = shell_exec("java MyClass");
 

echo $result;

exec("cp -rf ./restore/MyClass.java ."); 

exec("rm MyClass.class"); 
}
else{
echo "TestC3 not set";}

if(isset($info4['TestC4'])){
$Test4= $info4['TestC4'];
$Test4 = explode(",",$Test4);
//print_r($Test4);
$Getit = mysql_query("SELECT Method,Parameters FROM openended WHERE Question ='$Que1'");
$bring =mysql_fetch_assoc($Getit);
$yo = $ans[$i];
//echo $yo
$file="MyClass.java";
file_put_contents($file, $yo, FILE_APPEND);
$file2 = "public static void main(String[]args) {";
file_put_contents($file, $file2, FILE_APPEND);
$Meth = $bring[Method];
$Param = $bring[Parameters];
//echo $Meth;
//echo$Param;

if(($Test4[0])>0 && ($Test4[0])<100000000000){
	echo "";
}else{
$yo2='"'.$Test4[0].'"';
$Test4[0]=$yo2;
}
if(($Test4[1])>0 && ($Test4[1])<100000000000){
	echo "";
}else{
$yo2='"'.$Test4[1].'"';
$Test4[1]=$yo2;
}
if(($Test4[2])>0 && ($Test4[2])<100000000000){
	echo "";
}else{
$yo2='"'.$Test4[2].'"';
$Test4[2]=$yo2;
}

//echo $Test4[0];
//echo $Test4[1];
//echo $Test4[2];

if($Param == 1){
$yo2 =("int TestCase4; TestCase4= ".$Meth."(".$Test4[0].");"); }
elseif($Param == 2){
$yo2 =("int TestCase4; TestCase4 = ".$Meth."(".$Test4[0].",".$Test4[1].");"); }
else{
$yo2 =("int TestCase4; TestCase4 = ".$Meth."(".$Test4[0].",".$Test4[1].",".$Test4[2].");"); }

file_put_contents($file, $yo2, FILE_APPEND);

$file3="System.out.println(TestCase4);}}";

file_put_contents($file, $file3, FILE_APPEND);

exec("javac MyClass.java");

$result = shell_exec("java MyClass");
 

echo $result;

exec("cp -rf ./restore/MyClass.java ."); 

exec("rm MyClass.class"); 
}
else{
echo "TestC4 not set";}

}

/*
 

$yo = $ans['0'];

//echo $yo;


$file="MyClass.java";
file_put_contents($file, $yo, FILE_APPEND);
$file2 = "public static void main(String[]args) {";

file_put_contents($file, $file2, FILE_APPEND);




$yo2 =("int TestCase1 = addint(".$Test1[0].",".$Test1[1].");");


file_put_contents($file, $yo2, FILE_APPEND);

$file3="System.out.println(TestCase1);}}";

file_put_contents($file, $file3, FILE_APPEND);


exec("javac MyClass.java");

$result = shell_exec("java MyClass");
 

echo $result;

exec("cp -rf ./restore/MyClass.java ."); 

exec("rm MyClass.class"); 


/*$parameter = mysql_query("select Opt1 from $Name where Opt2 = '' AND Opt3 = '' AND Opt4 = ''");
$info = mysql_fetch_assoc($parameter);
$para = $info[('Opt1')];
$output = $OE;

$method_pattern = '/([a-zA-Z]+ \()|([a-zA-Z]+\()/';
preg_match($method_pattern, $output, $method);
$method = trim($method[0], '(');


$file = "MyClass.java";
$file2 = "ending.txt";
$file3 ="method.txt";
file_put_contents($file3, $method, FILE_APPEND);
$error_output = "";
$java_output = "";


$newadd =" public static void main (String[] args) { int a=2; int b=5; int c=10 $method ();}";
file_put_contents($file, $newadd, FILE_APPEND);
file_put_contents($file, $ans, FILE_APPEND);
file_put_contents($file, "}", FILE_APPEND);


//exec("javac MyClass.java 2>&1", $output);
//print_r($output);
//exec("javac MyClass.java");

//exec('javac '.$file,$output,$resultCode);
//echo exec("java -cp . MyClass", $output,$resultCode); 
*/
?>