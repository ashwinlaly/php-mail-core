<?php
  function clean_string($string) {
    $bad = array("content-type","bcc:","to:","cc:","href");
    return str_replace($bad,"",$string);
  }

  if(isset($_POST['email_from'])) {
    $email_from = $_POST['email_from'];
    $email_to = $_POST['email_to'];
    $email_subject = $_POST['email_subject'];
    $email_message = $_POST['message'];
    $email_message .= " ".clean_string($email_message)."\n";
    
    $headers = 'From: '.$email_from."\r\n".
    'Reply-To: '.$email_from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
    mail($email_to, $email_subject, $email_message, $headers);

  } else {
    echo "23";
  }
?>