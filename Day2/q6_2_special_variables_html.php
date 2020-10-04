<html>
<form  action='q6_2_special_variables.php' method='POST'>
Name    : <input type='text' name='Name'><br><br>
Subject 1: <input type='text' name='Sub1'><br><br>
Subject 2: <input type='text' name='Sub2'><br><br>
Subject 3: <input type='text' name='Sub3'><br><br>
Subject 4: <input type='text' name='Sub4'><br><br>
Subject 5: <input type='text' name='Sub5'><br><br>
<input type='submit' value ='submit here'>
</form>
</html>

<?php

@$a = isset($_POST['Name']);
@$b = isset($_POST['Sub1']);
@$c = isset($_POST['Sub2']);
@$d = isset($_POST['Sub3']);
@$e = isset($_POST['Sub4']);
@$f = isset($_POST['Sub5']);

$omarks = $b + $c + $d + $e + $f ;

$tmarks = 500;

$p = ($omarks*100)/$tmarks ;

{
  echo "<b>Marksheet</b>";
  echo "<br><br>";
	echo "Name of student :".$a."<br><br>";
	echo "Subject 1:".$b."<br><br>";
	echo "Subject 2:".$c."<br><br>";
	echo "Subject 3:".$d."<br><br>";
	echo "Subject 4:".$e."<br><br>";
	echo "Subject 5:".$f."<br><br>";
	echo "Marks obtained:".$omarks."<br><br>";
	echo "Total marks:".$tmarks."<br><br>";
	echo "Percentage".$p."<br>";
}


?>
