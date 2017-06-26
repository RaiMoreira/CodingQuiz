<?php

exec("javac MyClass.java");
 
$result = shell_exec("java MyClass");
 
echo $result;

echo "hello";
?>