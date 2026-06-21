<?php
session_start();
require '../backend/connection_mysqli.php';

// 1. Vérifier que le code a été envoyé en POST

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: saisir_code.php?error=1");
    exit;
}

$code_saisi = trim($_POST['code'] ?? '');





/*

$_SESSION["test"] = $_POST['code'];

$code_saisi = $_SESSION["test"];
*/



if ($code_saisi === '') {
    header("Location: saisir_code.php?error=1");
    exit;
}

// 2. Vérifier que l'utilisateur est en session
if (!isset($_SESSION['email'])) {
    die("Erreur : utilisateur non identifié.");
}

$email = $_SESSION['email'];
/*
var_dump($email);
die();
*/




/*
var_dump($user_id, $code_saisi);
die();
*/



// 3. Récupérer l'ID utilisateur
/*
$sqlUser = "SELECT ID FROM listeofficiers WHERE email = ?";
$stmt = $conn->prepare($sqlUser);
$stmt->bind_param("s", $email);
$stmt->execute();
$resultUser = $stmt->get_result();
*/

$sqlUser = "SELECT ID FROM listeofficiers WHERE email = '$email'";
$resultUser = mysqli_query($conn, $sqlUser);

if (!$resultUser) {
    die("Erreur SQL : " . mysqli_error($conn));
}

$user = mysqli_fetch_assoc($resultUser); //procedurale
/*
var_dump($user);
die();
*/




if ($resultUser->num_rows === 0) {
    die("Erreur : utilisateur introuvable.");
}

// $user = $resultUser->fetch_assoc(); Orienté objet
$user_id = $user['ID'];
/*
var_dump($user_id);
die();
*/





// 4. Vérifier le code dans la table reinit_codes
$sqlCode = "
    SELECT * FROM reinit_codes
    WHERE user_id = ?
    AND code = ?
    AND used = 0
    AND expiration > NOW()
    ORDER BY id DESC
    LIMIT 1
";

$stmt2 = $conn->prepare($sqlCode);
if (!$stmt2) {
    die("Erreur SQL (prepare) : " . $conn->error);
}

if (!$stmt2->bind_param("is", $user_id, $code_saisi)) {
    die("Erreur SQL (bind_param) : " . $stmt2->error);
}

if (!$stmt2->execute()) {
    die("Erreur SQL (execute) : " . $stmt2->error);
}

$resultCode = $stmt2->get_result();
/*
var_dump($user_id, $code_saisi, $resultCode->num_rows);
die();
*/




// 5. Si aucun code valide → erreur
if ($resultCode->num_rows === 0) {
    header("Location: saisir_code.php?error=1");
    exit;
}

// 6. Marquer le code comme utilisé
$codeData = $resultCode->fetch_assoc();
/*
var_dump($codeData);
die();
*/


$code_id = $codeData['id'];

$sqlUpdate = "UPDATE reinit_codes SET used = 1 WHERE id = ?";
$stmt3 = $conn->prepare($sqlUpdate);
$stmt3->bind_param("i", $code_id);
$stmt3->execute();

// 7. Redirection vers la page de réinitialisation
header("Location: reinitialisation.php");
exit;

?>
