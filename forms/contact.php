<?php

session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

$errMsg = '';
$email = '';

//Apply some basic validation and filtering to the subject
if (array_key_exists('subject', $_POST)) {
    $subject = substr(strip_tags($_POST['subject']), 0, 255);
} else {
    $subject = 'No subject given.';
}

//Apply some basic validation and filtering to the query
if (array_key_exists('message', $_POST)) {
    //Limit length and strip HTML tags
    $message = substr(strip_tags($_POST['message']), 0, 16384);
} else {
    $errMsg = 'No message given.';
}

//Apply some basic validation and filtering to the name
if (array_key_exists('name', $_POST)) {
    //Limit length and strip HTML tags
    $name = substr(strip_tags($_POST['name']), 0, 255);
} else {
    $errMsg = 'No name given.';
}

$toEmail = "me@bnkd.me";

if ($errMsg == '') {
    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->Host = 'smtp.sendgrid.net'; //Adresse IP ou DNS du serveur SMTP
    $mail->SMTPAuth = true; // utiliser SMTP
    $mail->Port = 465;

    $mail->SMTPSecure = 'ssl'; //Protocole de sécurisation des échanges avec le SMTP
    $mail->Username   =  'apikey';
    $mail->Password   =  ''; // Mot de passe STMP

    $mail->CharSet = PHPMailer::CHARSET_UTF8;

    $mail->setFrom($toEmail, (empty($name) ? 'Contact form' : $name));

    $mail->From       = trim("me@bnkd.me"); //L'email à afficher pour l'envoi
    $mail->FromName   = trim($_POST["name"]); //L'alias de l'email de l'emetteur

    $mail->AddAddress("me@bnkd.me");

    $mail->Subject = 'Contact form: ' . $subject;
    $mail->WordWrap   = 50; //Nombre de caracteres pour le retour a la ligne automatique
    $mail->Body = "Message contact form: \n\n" . $message;
    $mail->IsHTML(false); //Préciser qu'il faut utiliser le texte brut


    if (!$mail->send()) {
        $_SESSION['email_error'] = $mail->ErrorInfo;
        header("Location: ../contact.php");
        exit; 
    } else {
        $_SESSION['success'] = "Votre message a bien été envoyé! Vous aurez une réponse dans les 48h.";
        header("Location: ../contact.php");
        exit;
    }
} else {
    $_SESSION['email_error'] = $errMsg;
    header("Location: ../contact.php");
    exit;
}
