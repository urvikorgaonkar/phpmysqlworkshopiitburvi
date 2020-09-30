<?php

$m1 = array(array(2,2),array(3,3));
$m2 = array(array(4,5),array(3,2));

echo "matrix Addition";
echo " <br>";

for($i=0 ; $i<2; $i++)
{
	for($j=0 ; $j<2 ; $j++)
	{
		echo $m1[$i][$j]+$m2[$i][$j] ;

	}
	echo "<br>";
}

?>
