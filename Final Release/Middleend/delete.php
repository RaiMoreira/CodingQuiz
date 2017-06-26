<?php

$file = "cs490.java";
$current = file_get_contents($file);
//$current = file_get_contents($file);
//$current = $ans;
$current .= "John Smith\n";
file_put_contents("/afs/cad.njit.edu/u/m/o/mo75/public_html/hkhan/cs490.java", $current, FILE_APPEND);

?>