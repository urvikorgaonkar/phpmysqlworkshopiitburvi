<?php

if($_POST['submit'])
{
   $name = $_POST['name'];
   $message =$_POST['message'];

   if($name && $message)
     {


        $toemail = $_POST['toemail'];

        $subject = "PCE : Feedback acknowledgement message!";
        $body = "Thanks for your valuable feedback $name ! We hope you will participate in the upcoming events by the same enthusiasm and give us the sheer support to organise such quality events.";
        $headers = "From: korgaonkarurvi@gmail.com";

        if (mail($toemail, $subject, $body, $headers))
          {
            echo "Email successfully sent to $toemail...";
            $toemail = "korgaonkarurvi@gmail.com";
            $subject = "$name has successfully given a feedback!";
            $body = $_POST['message'];
            $headers = $_POST['toemail'];

            if(mail($toemail, $subject, $body, $headers))
            {
              echo "<br>Feedback successfully received by administration!";
            }
            else {
              echo "Error sending the feedback!";
            }
          }
          else
          {
            echo "Email sending failed...";
          }
    }
}
?>
