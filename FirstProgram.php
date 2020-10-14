if($_POST['submit'])

   $name = $_POST['name'];
   $toemail = $_POST['toemail'];
   $message = $_POST['message'];

   if($toemail && $message)
   {

require 'PHPMailerAutoload.php'; //PHPMailer Object
$mail = new PHPMailer; //From email address and name
$mail->From = "korgaonkarurvi@gmail.com";
$mail->FromName = "Urvi Korgaonkar"; //To address and name
$mail->addAddress($toemail , $name);//Recipient name is optional
$mail->addAddress($toemail); //Address to which recipient will reply
$mail->addReplyTo("korgaonkarurvi@gmail.com", "Reply"); //CC and BCC
//$mail->addCC("cc@example.com");
//$mail->addBCC("bcc@example.com"); //Send HTML or Plain Text email
$mail->isHTML(true);
$mail->Subject = "Thanks for your feedabck!";
$mail->Body = "<i>$message</i>";
//$mail->AltBody = "This is the plain text version of the email content";
 if(!$mail->send())
 {
  echo "Mailer Error: " . $mail->ErrorInfo;
 }
 else { echo "Message has been sent successfully";
 }
 if(!$mail->send())
 {
  echo "Mailer Error: " . $mail->ErrorInfo;
 }
 else
 {
  echo "Message has been sent successfully";
 }
}
?>


/*if($_POST['submit'])

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
*/
