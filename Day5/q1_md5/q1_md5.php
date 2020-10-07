<?php

require("conn.php");

@$username = $_POST['Username'];
@$userpassword = $_POST['Password'];

$userpasswordenc = md5($userpassword);

if($username && $userpasswordenc)
{
       $write = "INSERT INTO data1 VALUES ('$username' , '$userpasswordenc')";

       if ($conn-> query ($write) === TRUE)
            {
       			 echo "<br><b><i>Record created successfully!</i></u>";
       		  }
            else
            {
       			 echo "Error: " . $write. "<br>" . $connect1->error;
       	    }
}
$conn->close();


?>

<form action = 'q1_md5.php' method = 'POST'>
Enter Username:     <input type = 'name' name='Username'><br><br>
Enter Your Password: <input type = 'text' name = 'Password'>
                     <input type = 'submit' value = 'Login'>
</form>
