<?php
// Retirer ce fichier tracking github - le stocker dans yahoo mail
session_start();
require '../backend/connection_mysqli.php'; 
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// 1. Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['email'])) {
    die("Erreur : aucun utilisateur connecté.");
}

$email = $_SESSION['email'];

// 2. Générer un code aléatoire
$code = random_int(100000, 999999); // 6 chiffres
//$expiration = date("Y-m-d H:i:s", time() + 600); // expire dans 10 minutes
$expiration = date("Y-m-d H:i:s", time() + 86400); // +24h


// 3. Récupérer l'ID utilisateur
$sqlUser = "SELECT ID FROM listeofficiers WHERE email = ?";
$stmt = $conn->prepare($sqlUser);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Utilisateur introuvable.");
}

$user = $result->fetch_assoc();
$user_id = $user['ID'];

// 4. Insérer le code dans la table reinit_codes
$sqlInsert = "INSERT INTO reinit_codes (user_id, code, expiration, used) VALUES (?, ?, ?, 0)";
$stmt2 = $conn->prepare($sqlInsert);

// IMPORTANT : code = VARCHAR → on utilise "iss"
$stmt2->bind_param("iss", $user_id, $code, $expiration);

$stmt2->execute();

// 5. Envoyer le mail avec PHPMailer
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host = 'smtp.mail.yahoo.com'; 
    $mail->SMTPAuth = true;
    $mail->Username = 'a.andjib@yahoo.fr';
    $mail->Password = 'oxbkxihulnudvwhp';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    $mail->setFrom('a.andjib@yahoo.fr', 'Etat Civil');
    $mail->addAddress($email);

    $mail->isHTML(true);
	$mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';

    $mail->Subject = "Votre code de réinitialisation";
	$mail->Body = "
		<div style='font-family: Arial, sans-serif; font-size: 15px; color: #333;'>
			<p>Bonjour,</p>
			<p>Voici votre code de réinitialisation :</p>

			<div style='
				font-size: 28px;
				font-weight: bold;
				background: #f3f3f3;
				padding: 10px 20px;
				border-radius: 8px;
				display: inline-block;
				margin: 10px 0;
			'>
				$code
			</div>

			<p>Ce code expire dans <strong>10 minutes</strong>.</p>
			<p style='margin-top: 20px;'>Cordialement,<br>L’équipe d’état civil</p>
		</div>
	";


    $mail->send();

} 

catch (Exception $e) {
    //die("Erreur lors de l'envoi du mail : " . $mail->ErrorInfo);
    echo '
    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, roles-scalable=yes">
        <title>Erreur de connexion</title>
        <style>
            body {
                background:#E8E4D8; /* #f2f2f2; */
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
            }
            .box {
                width: 350px;
                margin: 100px auto;
                background: white;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
                text-align: center;
            }
            .box h2 {
                color: #c0392b;
            }
        </style>
    </head>
    <body>
        <div class="box">
            <h2>Erreur de connexion</h2>
            <p>Impossible d\'envoyer l\'email.</p>
            <p><b>Veuillez vérifier votre connexion internet<br> puis réessayer.</b></p>
        </div>
    </body>
    </html>
    ';

    exit;
}


// 6. Redirection vers la page de saisie du code
header("Location: saisir_code.php");
exit;

?>



