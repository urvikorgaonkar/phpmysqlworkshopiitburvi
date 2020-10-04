<?php

//require("connect.php");

$userpassword = "abc";
$userpasswordenc = md5($userpassword);

if(isset($_POST['Password']))
{
   $submittedenc = md5($_POST['Password']);

   if($submittedenc == $userpasswordenc)
   {
       echo "Compared $userpasswordenc to".$submittedenc."<br>" ;
       die("Correct");
   }
   else
       die("Incorrect");
}

/*if (isset($_POST["submit"]))
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

}*/


?>

<form action = 'q1_md5.php' method = 'POST'>
Enter Username:     <input type = 'name' name='username'><br><br>
Enter Your Password: <input type = 'text' name = 'Password'>
                     <input type = 'submit' value = 'Login'>
</form>
