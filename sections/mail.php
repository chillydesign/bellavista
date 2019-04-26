<?php


if(!empty($_POST['email'])) {

  $email =$_POST['email'];


    function clean_string($string) {

      $bad = array("content-type","bcc:","to:","cc:","href");

      return str_replace($bad,"",$string);

    }




    // validation expected data exists


    if(empty($_POST['docs'])) {

         echo 'Veuillez sélectionner au moins un document ';

    } else {
      $docs = $_POST['docs'];
      if (count($docs) == 1) {$download_sentence = '<p>Téléchargez le document demandé ci-dessous:</p>'; }
      else {$download_sentence = '<p>Téléchargez les documents demandés ci-dessous:</p>';}


      require '../../../../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

      $mail = new PHPMailer;
      $mail->CharSet = 'UTF-8';


      $mail->isSMTP();                                      // Set mailer to use SMTP
      $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
      $mail->SMTPAuth = true;                               // Enable SMTP authentication
      $mail->Username = 'promolac.geneve@gmail.com';                 // SMTP username
      $mail->Password = 'wjnuvNZF$q';                           // SMTP password
      $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
      $mail->Port = 587;
      //$mail->SMTPDebug  = 2;

      $mail->setFrom('contact@villasdesgrumes.ch', 'PromoLAC');
      //$mail->addAddress('harvey.charles@gmail.com', 'Charles Harvey');     // Add a recipient
      $mail->addAddress($email);               // Name is optional
      $mail->addReplyTo('contact@promolac.ch', 'PromoLAC');
      // $mail->addCC('cc@example.com');
      $mail->addBCC('contact@promolac.ch');

      //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
      //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
      $mail->isHTML(true);                                  // Set email format to HTML


      $body =  file_get_contents(dirname(__FILE__) . '/email_header.php');

      $body .= '<!-- 1 Column Text + Button : BEGIN -->
<tr>
    <td bgcolor="#ffffff">
        <table cellspacing="0" cellpadding="0" border="0" width="100%">
          <tr>
                <td style="padding: 40px; font-family: sans-serif; font-size: 15px; mso-height-rule: exactly; line-height: 20px; color: #555555;">
                    <h1 style="line-height:120%;padding:00px;margin:0 0 30px">Villas des Grumes - Documentation</h1>
                    <p>Merci pour votre intérêt pour notre nouvelle promotion les Villas des Grumes à Bex. Vous trouverez en pièce jointe la documentation demandée. </p>
                    <p>Pour plus d\'informations n\'hésitez pas à nous contacter au +41 22 839 30 40 ou par email à l\'adresse <a href="mailto:contact@promolac.ch">contact@promolac.ch</a></p>';

$body .= $download_sentence;
 foreach ($docs as $value) {
  $pieces = explode("|", $value);
  $link = '<a style="display: block; padding: 8px; text-align: center; background: #1e3a21; color: white; font-weight: bold; text-decoration: none; margin: 20px 0 0; " href ="' . $pieces[1] . '" target="_blank">' .  $pieces[0] . '</a> ';
  $body .= $link;
 }

 $body .= '
                </td>
        </tr>
        </table>
    </td>
</tr>
<!-- 1 Column Text + Button : BEGIN -->';

 $body .=  file_get_contents(dirname(__FILE__) . '/email_footer.php');


      $mail->Subject = 'Documentation Villa des Grumes';
      $mail->Body    = $body;
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      if(!$mail->send()) {
          echo 'Une erreur s\'est produite et le message n\'a pas pu être envoyé';
          echo 'Mailer Error: ' . $mail->ErrorInfo;
      } else {
          echo 'La documentation demandée vous a été envoyée sur votre adresse email';
      }


    }





} elseif(empty($_POST['email']) AND empty($_POST['docs'])) {echo 'Veuillez saisir une adresse email et sélectionner au moins un document';}

else {
  echo 'Veuillez saisir une adresse email ';
}

?>
