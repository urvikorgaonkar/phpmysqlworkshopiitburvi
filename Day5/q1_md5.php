<?php

require("conn.php");

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

if (isset($_POST["submit"]))
$username = (isset($_POST['Username']));
$Password = (isset($_POST['userpasswordenc']));


$extract = mysqli_query($conn, "SELECT * FROM data1 WHERE Username ='username' AND Password ='Password' ORDER BY id ASC") or die(mysqli_error());
$numrows = mysqli_num_rows($extract);

while($rows = mysqli_fetch_assoc($extract))
{
  $Username = $rows['Username'];
  $Password = $rows['Password'];

}


?>

<form action = 'q1_md5.php' method = 'POST'>
Enter Username:     <input type = 'name' name='username'><br><br>
Enter Your Password: <input type = 'text' name = 'Password'>
                     <input type = 'submit' value = 'Login'>
</form>
