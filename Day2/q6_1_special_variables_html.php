<html>
<form  action='q6_1_special_variables_html.php' method='POST'>
side1:<input type='text' name='side1'><br><br>
side2:<input type='text' name='side2'><br><br>
side3:<input type='text' name='side3'><br><br>
<input type='submit' value ='click here'>
</form>
</html>
<?php

@$a=$_POST['side1'];
@$b=$_POST['side2'];
@$c=$_POST['side3'];



     echo"Side 1 =".$a."<br>";
     echo"Side 2 =".$b."<br>";
     echo"Side 3 =".$c."<br>";

if($a)
{

  if($a==$b && $b==$c)
  {
  echo "Triangle is equilateral triangle";
  }

  elseif($a==$b||$b==$c||$c==$a)
  {
  echo "Triangle is isosceles triangle";
  }

  else
  {
  echo "Triangle is scalene triangle";
  }

}


?>
