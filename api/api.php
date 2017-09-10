<?php
session_start();

/* Constantes que serão usadas abaixo */
define(SAAS, "smtp@lwsuporte.com.br");
define(ASSUNTO, "Teste via API");

/* Assunto da mensagem */
$subject = ASSUNTO;

/* Token do SMTP Locaweb */
$x_auth_token = trim($_POST['token']);

/* URL da requisição */
$api_url = 'https://api.smtplw.com.br/v1';

/* Email de remetente */
$from = trim($_POST['remetente']);

/* Email do destinatário (Nós) */
$to = array(SAAS);
 
/* Destinatários em cópia oculta */
$destinatario = trim($_POST['destinatario']);
$destinatario2 = trim($_POST['destinatario2']);

if(!empty($destinatario) && !empty($destinatario2)) {
  $bcc = array($destinatario, $destinatario2);
  } elseif(!empty($destinatario) && empty($destinatario2)) {
    $bcc = array($destinatario);
  } elseif(empty($destinatario) && !empty($destinatario2)) {
    $bcc = array($destinatario2);
  } else {
    $bcc = array();  
  }


/* Assunto da mensagem */
$xsmtplw = $_POST['xsmtplw'];

/* Corpo da mensagem */
$body = '<h3 font-face="Tahoma">Teste efetuado com sucesso!</h3><br><br>'

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

$custom_headers = array(
  'headers' => array(
    'Reply-to' => $from,
    'Content-type' => "text/html",
    'x-smtplw' => $xsmtplw
    )
);

/* Headers necessários para o envio */
$headers = array(
  "x-auth-token: $x_auth_token",
  "Content-type: application/json"
);

/* Prenchimento dos campos para o envio */
$data_string = array(
  'from'    => $from,
  'to'      => $to,
  'bcc'     => $bcc,
  'subject' => $subject,
  'body'    => $body,
  'headers' => $custom_headers['headers']
);



/* Processo de envio via CURL */
$ch = curl_init("$api_url/messages");
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data_string));
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
$response = curl_exec($ch);
$curlInfo = curl_getinfo($ch);
curl_close($ch);

/* Trata o resultado da requisição (Sucesso ou falha) e redireciona */
switch($curlInfo['http_code']) {
  case '201':
    $status = '';
    if (preg_match('@^Location: (.*)$@m', $response, $matches)) {
      $location = trim($matches[1]);
    }

    // Add other actions here, if necessary.
    break;
  default:
    $status = "Erro: Código $curlInfo[http_code]";
    $_SESSION['erroSMTP'] = $status;
    header('Location: falha.php');
    break;
}

$_SESSION['resultado'] = "\nResultado: {$status}\n";
if ($location) {
	$_SESSION['envioSMTP'] = "\n {$location}\n\n";
	header('Location: sucesso.php');
}

?>
