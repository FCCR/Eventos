<?php 
session_start();
header('Content-Type: text/html; charset=UTF-8');

include_once(__DIR__ . "/mail/forgot_pass.php");
$conteudo = ob_get_contents();
ob_end_clean();

$nome = $_SESSION['nome'];
$sobrenome = $_SESSION['sobrenome'];
$email = $_SESSION['email'];
$senha = $_SESSION['senha'];

require 'mailer/PHPMailerAutoload.php';

//configuração do servidor
$mail = new PHPMailer();
$mail->CharSet = 'UTF-8';
$mail->Encoding = 'base64';
$mail->isSMTP();
$mail->Host = 'mail.fccr.sp.gov.br';
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'tls';
$mail->Username = 'eventos@fccr.sp.gov.br'; //conta do servidor de emails
$mail->Password = 'fccr#sjc@2018'; //senha dessa conta
$mail->Port = 25;

//configuração das contas 
$mail->setFrom('eventos@fccr.sp.gov.br'); //conta que vai receber os emails
//$mail->addReplyTo('no-reply@gmail.com.br');
$mail->addAddress($email); //conta que vai receber os emails

//mensagem a ser enviada
$mail->isHTML(true);
$mail->Subject = 'Lembrete de senha para ' . $nome;
$mail->Body    = $conteudo;

/* ================= Opcionais como anexo e corpo alternativo ===================
$mail->AltBody = 'Para visualizar essa mensagem acesse http://site.com.br/mail';
$mail->addAttachment('/tmp/image.jpg', 'nome.jpg');
*/

//envia os emails
if(!$mail->send()) {
  header('Location: ./views/failedmail.php?'. $mail->ErrorInfo);
} else {
  header('Location: ./views/successmail.php?');
}

//debugger
$mail->SMTPDebug = 3;
$mail->Debugoutput = 'html';
$mail->setLanguage('pt');

