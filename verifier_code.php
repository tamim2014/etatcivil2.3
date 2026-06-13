<?php
session_start();
require_once 'backend/connection_mysqli.php';

/*
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: saisir_code.php?error=1");
    exit;
}
*/


// Vérifier que l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: authentification.php");
    exit;
}

$user_id = $_SESSION['user_id'];
 $code_saisi = $_POST['code'] ?? '';



// Si aucun code n'a été envoyé → retour

if (empty($code_saisi)) {
    header("Location: saisir_code.php?error=1");
    exit;
}


// 1) Vérifier si un code valide existe
$sql = "
    SELECT * FROM reset_codes
    WHERE user_id = ?
      AND code = ?
      AND used = 0
      AND expiration > NOW()
    ORDER BY id DESC
    LIMIT 1
";

$stmt = $conn->prepare($sql);
$stmt->bind_param("is", $user_id, $code_saisi);
$stmt->execute();
$result = $stmt->get_result();
$reset = $result->fetch_assoc();

// 2) Si aucun code valide → erreur
if (!$reset) {
    header("Location: saisir_code.php?error=1");
    exit;
}

// 3) Marquer le code comme utilisé
$sql = "UPDATE reset_codes SET used = 1 WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $reset['id']);
$stmt->execute();

// 4) Redirection vers la page de réinitialisation
header("Location: reinitialisation.php");
exit;
?>
