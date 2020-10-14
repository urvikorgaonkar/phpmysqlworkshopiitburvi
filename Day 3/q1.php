
<form action='q1.php' method='POST'>
<b>Name of the student :</b> <input type='text' name='name' ><br><br>
<u>Marks in each subject:</u> <br><br>
Subject 1  : <input type='number' name='sub1' ><p>
Subject 2  : <input type='number' name='sub2' ><p>
Subject 3  : <input type='number' name='sub3' ><p>
Subject 4  : <input type='number' name='sub4' ><p>
Subject 5  : <input type='number' name='sub5' ><p>
<input type='submit' name="submit" value='Submit marks'>

</form>


<?php

require("connect1.php");

@$name = $_POST['name'];
@$sub1 = $_POST['sub1'];
@$sub2 = $_POST['sub2'];
@$sub3 = $_POST['sub3'];
@$sub4 = $_POST['sub4'];
@$sub5 = $_POST['sub5'];
@$total_obtained = ($sub1 + $sub2 + $sub3 + $sub4 + $sub5) ;
@$total_marks = 500 ;
@$percent = ($total_obtained*100)/$total_marks ;

if($name && $sub1 && $sub2 && $sub3 && $sub4 && $sub5 )
{
  echo "<br> <b>Marksheet of $name :</b> <br>";
  echo "Subject 1: $sub1 <br>";
  echo "Subject 2: $sub2 <br>";
  echo "Subject 3: $sub3 <br>";
  echo "Subject 4: $sub4 <br>";
  echo "Subject 5: $sub5 <br>";
  echo "Total Marks Obtained :  $total_obtained <br>";
  echo "Total marks: $total_marks <br>";
  echo "Percentage:$percent <br> ";

$write = "INSERT INTO class1 VALUES ('','$name', $sub1, $sub2, $sub3, $sub4, $sub5, $total_obtained, $total_marks, $percent)";

if ($connect1-> query ($write) === TRUE)
     {
			 echo "New record created successfully";
		 }
     else
     {
			 echo "Error: " . $write. "<br>" . $connect1->error;
	   }
}
$connect1->close();
?>
