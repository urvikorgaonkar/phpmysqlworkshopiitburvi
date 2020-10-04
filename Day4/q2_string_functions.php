<?php

$string1 = "workshop";
echo "1. No.of characters in the string are : ";
echo strlen($string1);

echo "<br><br>";
echo "2. Breaking down a string into an array : ";
$string2 = "1  2  4  6  7";
$exparray = explode("  ", $string2);
echo $exparray[2];

echo "<br><br>";
echo "3. Reversing a string: ";
echo strrev("tutorial");

echo "<br><br>";
echo "4. Converting string into lower case: ";
$string4 = "COLLEGE";
echo strtolower($string4);

echo "<br><br>";
echo "5. Converting string into upper case: ";
$string5 = "Database";
echo strtoupper($string5);

echo "<br><br>";
echo "6. Replacing array value : ";
$string6 = " Hello everyone!";
$replace = substr_replace($string6, "Urvi", 7,10);
echo  $replace;

?>
