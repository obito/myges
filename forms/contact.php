<?php
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';


function MakeRequest($endpoint, $data) {
    // Set endpoint
    $url = "https://discord.com/api/".$endpoint."";

    // Encodez les données, car Discord vous demande d'envoyer des données json.
    $data = json_encode($data);

    // Initialize new curl request
    $ch = curl_init();
    // $f = fopen('request.txt', 'w'); // écrire la request dans un fichier .txt (debugging)

    // Set headers, data etc..
    curl_setopt_array($ch, array(
        CURLOPT_URL            => $url, 
        CURLOPT_HTTPHEADER     => array(
            'Authorization: Bot TOKEN_ICI', // Mettre le token bot discord à la place de "TOKEN_ICI"
            "Content-Type: application/json",
            "Accept: application/json"
        ),
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_FOLLOWLOCATION => 1,
        CURLOPT_VERBOSE        => 1,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_POSTFIELDS => $data,
        //CURLOPT_STDERR => $f,
    ));

    $request = curl_exec($ch);

    echo $request;
    curl_close($ch);
    return json_decode($request, true);
}

// Ouvrir la liste de DMs d'abord
$newDM = MakeRequest('/users/@me/channels', array("recipient_id" => "892394978213498930")); // change recipient_id with discord id

$errMsg = '';

// Appliquer une validation et un filtrage de base au sujet.
if (array_key_exists('subject', $_POST)) {
    $subject = substr(strip_tags($_POST['subject']), 0, 255);
} else {
    $subject = "Aucun";
}

//Appliquer une validation et un filtrage de base au message.
if (array_key_exists('message', $_POST)) {
    // Limiter la longueur et supprimer les balises HTML
    $message = substr(strip_tags($_POST['message']), 0, 16384);
} else {
    $errMsg = "Aucun message n'a été donné.";
}

// Appliquer une validation et un filtrage de base au nom.
if (array_key_exists('name', $_POST)) {
    // Limiter la longueur et supprimer les balises HTML
    $name = substr(strip_tags($_POST['name']), 0, 255);
} else {
    $errMsg = "Aucun nom n'a été donné";
}

// Appliquer une validation et un filtrage de base à l'email.
if (array_key_exists('email', $_POST)) {
    // Limiter la longueur et supprimer les balises HTML
    $email = substr(strip_tags($_POST['email']), 0, 255);
} else {
    $errMsg = "Aucun e-mail a été donné.";
}

$toEmail = "me@bnkd.me";

if ($errMsg == '') {
    // Vérifie si le DM est bien présent, si oui, envoyer le message.
    if(isset($newDM["id"])) {
        $newMessage = MakeRequest("/channels/".$newDM["id"]."/messages", array("content" => "Message de " . $name . " (". $email . ") " . "Sujet: " . $subject . "\Body: " . $message));
    }

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

    $mail->From       = "me@bnkd.me"; //L'email à afficher pour l'envoi
    $mail->FromName   = $name; //L'alias de l'email de l'emetteur

    $mail->AddAddress("me@bnkd.me");

    $mail->Subject = 'Formulaire de contact: ' . $subject;
    $mail->WordWrap   = 50; //Nombre de caracteres pour le retour a la ligne automatique
    $mail->Body = "Venant de: " . $email . " Message: \n\n" . $message;
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
