<?php

if($_POST['submit'])
{
   $name = $_POST['name'];
   $message =$_POST['message'];

  if($name && $message)
  {
    if(strlen($name)<=20 && strlen($message)<=300)
    {
      $to = "korgaonkarurvi@gmail.com";
      $subject = "Confirmation Email From PCE";
      $headers = "From : anitakorgaonkar@gmail.com";
      
      $body ="This is an email from $name\n\n $message";


      mail($to, $subject, $body, $headers);
    }
    else
      die("Max lengh for name is 20 and max length for message is 300");
  }
  echo $name ." ". $message ;
}
 ?>

 <html>

 <form action = 'sendemail.php' method = 'POST'>
Name:        <input type ='text' name ='name' maxlength = '20'> <br>
Message:<br> <textarea name = 'message'>
             </textarea> <p>
            <input type= 'submit' name='submit' value = 'send me this'>
 </form>
</html>
