<?php
// Forcer le sortie en UTF-8
header('content-type: text/html; charset=utf-8');


session_start();
require_once 'backend/connection_mysqli.php';

// Vérifier que l'utilisateur est connecté
if (!isset($_SESSION['user_id']) || !isset($_SESSION['email'])) {
    header("Location: authentification.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$email   = $_SESSION['email'];

// 1) Générer un code à 5 chiffres
$code = rand(10000, 99999);

// 2) Définir l'expiration (5 minutes)
$expiration = date('Y-m-d H:i:s', time() + 300);

// 3) Enregistrer en base
$sql = "INSERT INTO reset_codes (user_id, code, expiration) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iss", $user_id, $code, $expiration);
$stmt->execute();

// 4) Envoyer le code par mail
/*
$subject = "Code de réinitialisation";
$message = "Bonjour,\n\nVotre code de réinitialisation est : $code\nIl est valable pendant 5 minutes.\n\nCordialement.";
$headers = "From: noreply@etatcivil.com";

mail($email, $subject, $message, $headers);
*/

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.mail.yahoo.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'a.andjib@yahoo.fr';
    $mail->Password   = 'oxbkxihulnudvwhp';
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;

    $mail->setFrom('a.andjib@yahoo.fr', 'Etat Civil');
    $mail->addAddress($email);
    // &eacute; ne marche pas. Essayer "é" en hexadecimal &#xE9; ou &#233;
    //$mail->Subject = 'Code de r&#233;initialisation';//
    $mail->Subject = "Code de réinitialisation";
    $mail->Body    = "Bonjour,\n\nVotre code de r&#233;initialisation est : $code\nIl est valable 5 minutes.\n\nCordialement.";

    $mail->send();
} catch (Exception $e) {
    echo "Erreur lors de l'envoi du mail : {$mail->ErrorInfo}";
}




// 5) Redirection vers la page de saisie du code
header("Location: saisir_code.php");
exit;
?>
