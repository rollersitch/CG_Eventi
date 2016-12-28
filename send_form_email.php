<?php
 
  if(isset($_POST['email'])) {
 
    $email_to = "dany88vai@gmail.com";
 
    $email_subject = "Richieste dal sito";
 
    function died($error) {
 
        // your error code can go here
 
        echo "Siamo spiacenti, ma ci sono degli errori nei dati inseriti nel form. Ritenta.";
 
        echo "Di seguito gli errori.<br /><br />";
 
        echo $error."<br /><br />";
 
        echo "Correggere gli errori e ritentare.<br /><br />";
 
        die();
 
    }
  
 
     
 
    // validation expected data exists
 
    if( !isset($_POST['email']) || !isset($_POST['textarea']) ) {
 
        died('Siamo spiacenti, uno o entrambi dei campi del form sono vuoti.');       
 
    }
 
     
 
    $email_from = $_POST['email']; // required
 
    $textarea = $_POST['textarea']; // required
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
    if(!preg_match($email_exp,$email_from)) {
 
      $error_message .= "L'indirizzo email inserito sembra non valido.<br />";
 
    }
 
    if(strlen($textarea) < 2) {
 
      $error_message .= 'Il testo del messaggio sembra non valido.<br />';
 
    }
 
    if(strlen($error_message) > 0) {
 
      died($error_message);
 
    }
 
    $email_message = "Form details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     

 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
 
    $email_message .= "Message: ".clean_string($textarea)."\n";
 
     
 
     
 
  // create email headers
 
    $headers = 'From: '.$email_from."\r\n".
 
    'Reply-To: '.$email_from."\r\n" .
 
    'X-Mailer: PHP/' . phpversion();
 
    @mail($email_to, $email_subject, $email_message, $headers);  
?>
 
 
Grazie per averci Contattati.
 
 
 
<?php
 
  }
 
?>