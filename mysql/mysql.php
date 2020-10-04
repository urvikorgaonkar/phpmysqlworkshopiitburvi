<?php

require("connect.php");
//$date = date("y-m-d");

// $write = mysqli_query($connect, "INSERT INTO people VALUES ('235','Shubham','Aarutwar','$date','M')") or die(mysqli_error());
// $update = mysqli_query($connect, "UPDATE people SET DoB = '2001-05-03' WHERE ID ='098'");
//$extract = mysqli_query($connect, "SELECT * FROM people ");
 //echo "<br>" ;
 //echo mysqli_num_rows($extract);
 if (isset($_POST["submit"]))
 $FirstName_form = (isset($_POST['FirstName']));
 $LastName_form = (isset($_POST['LastName']));


 $extract = mysqli_query($connect, "SELECT * FROM people WHERE FirstName='FirstName_form' AND LastName='LastName_form' ORDER BY id ASC") or die(mysqli_error());
 $numrows = mysqli_num_rows($extract);

 while($rows = mysqli_fetch_assoc($extract))
 {
   $ID = $rows['ID'];
   $FirstName = $rows['FirstName'];
   $LastName = $rows['LastName'];
   $DoB = $rows['DoB'];
   $Gender = $rows['Gender'];

   if ($Gender=="F")
     $Gender = "Female";
   else
     $Gender = "Male";

   echo "$FirstName $LastName  <br><br><br> ";

 }


 ?>
 <form action='mysql.php' method="POST">
 FirstName : <input type='text' name-'FirstName' ><br>
 LastName  : <input type='text' name-'LastName' ><p>
 <input type='submit' name="submit" value='Get data'>

</form>
