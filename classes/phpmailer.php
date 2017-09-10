<?php

session_start();

require 'class.phpmailer.php';

define('SERVIDOR', 'smtplw.com.br');

define('FROMNAME', 'SMTP Locaweb');

define('MAILSUBJECT', 'Teste via PHPMailer');

define('SAAS', 'smtp@lwsuporte.com.br');



$mail = new PHPMailer;



$mail->IsSMTP();                                      // Set mailer to use SMTP

$mail->Host = SERVIDOR;  // Specify main and backup server

//$mail->Host = 'smtp.www101.locaweb.com.br';  // Specify main and backup server

$mail->SMTPAuth = true;                               // Enable SMTP authentication

$mail->Username = trim($_POST['usuario']);                            // SMTP username

$mail->Password = trim($_POST['senha']);                           // SMTP password

//$mail->SMTPSecure = 'tls';                            // Enable encryption, 'ssl' also accepted



$mail->From = $_POST['remetente'];

$mail->FromName = FROMNAME;

//$mail->AddAddress($_POST['destinatario']);  // Add a recipient

$mail->AddReplyTo($_POST['remetente']);

//$mail->AddCC('cc@example.com');

$mail->AddBCC($_POST['destinatario']);

$mail->AddBCC($_POST['destinatario2']);

$mail->AddBCC(SAAS);

$x_smtplw = 'x-smtplw: ' . $_POST['xsmtplw'];

$mail->addCustomHeader($x_smtplw);	



$mail->WordWrap = 50;                                 // Set word wrap to 50 characters

//$mail->AddAttachment('/var/tmp/file.tar.gz');         // Add attachments

//$mail->AddAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

$mail->IsHTML(true);                                  // Set email format to HTML



$mail->Subject = MAILSUBJECT;

$mail->Body    = '<h3 font-face="Tahoma">Teste efetuado com sucesso!</h3><br><br>'

				 . $_POST['mensagem'] . 

				 '<p font-face="Tahoma">

				 Atenciosamente,

				 <br>Suporte Locaweb

				 <br><br>

				 ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------

				 <br>

				 <b style="color: #cc2d45;">[Atenção] </b>

				 <span style="color: #2467db;"> Este é um email de teste, não é necessária nenhuma ação do destinatário.

				 <br>

				 Entre em contato por um de nossos canais de atendimento.

				 <br>

				 <a href="http://www.locaweb.com.br/fale-conosco.html" target="_blank">http://www.locaweb.com.br/fale-conosco.html</a>

				 </span>

			  </p>';

$mail->AltBody = 'Se você está lendo essa mensagem, o envio foi feito através do SMTP Locaweb via PHPMailer com sucesso!';



// To load the French version

$mail->SetLanguage('br', 'language/');



if(!$mail->Send()) {

	$_SESSION['erroSMTP'] = $mail->ErrorInfo;

	header('Location: ../falha.php');

} else {

	header('Location: ../sucesso.php');

	exit;

	}



?>

