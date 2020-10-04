<?php

if($_POST['submit'])

   $toemail = $_POST['toemail'];
   $subject = $_POST['subject'];
   $message = $_POST['message'];

   if($toemail && $message)
   {
     $to = $toemail;
     $subject = $subject;
     $headers = "From: korgaonkarurvi@gmail.com";
     $body = $message;

     mail($to, $subject, $body, $headers);
     echo "Mail sent successfully!";
   }
   else
    die("Enter your name and feedback");
 ?>
