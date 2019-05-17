<?php
if(isset($_POST['email'])) {
    $email_to = "dylan.jc.garcia@gmail.com";
    $email_subject = $_POST['subject'];  //required
    $email_name = $_POST['name']; // required
    $email_from = $_POST['email']; // required
    $message = $_POST['message']; // required
    
    function clean_string($string) {
    $bad = array("content-type","bcc:","to:","cc:","href");
    return str_replace($bad,"",$string);
    }

 
    $email_message = "This message is from: ".clean_string($email_from)."\n";
    $email_message .= "Name: ".clean_string($email_name)."\n";
    $email_message .= "Message ".clean_string($message)."\n";

// create email headers
$headers = 'From: '.$email_from."\r\n".
'Reply-To: '.$email_from."\r\n" .
'X-Mailer: PHP/' . phpversion();
mail($email_to, $email_subject, $email_message, $headers);
?>
