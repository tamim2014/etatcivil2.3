<?php
session_start();
require_once 'backend/connection_mysqli.php';

// Récupération des champs
$login = $_POST['pseudo_'] ?? '';
$mdp   = $_POST['motdepasse_'] ?? '';

$message = 'Veuillez vous identifier dans les deux champs ci-dessus';

// Vérification des champs vides
if (isset($_POST["envoie"])) {

    if (empty($login)) {
        $message = 'Veuillez indiquer votre nom svp !';
    }

    if (empty($mdp)) {
        $message = 'Veuillez aussi indiquer votre mot de passe SVP !';
    }
}

// Si login + mdp remplis → on tente la connexion
if (!empty($login) && !empty($mdp)) {

    // 🔐 On récupère l'utilisateur par son pseudo uniquement
    $sql = "SELECT * FROM listeofficiers WHERE pseudo = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Vérification du mot de passe haché
    if ($row && password_verify($mdp, $row['motdepasse'])) {

        // Connexion OK → création de la session
        $_SESSION['user_id']    = $row['ID'];
        $_SESSION['pseudo']     = $row['pseudo'];
        $_SESSION['user_role']  = $row['roles'];

        // Redirection selon le rôle
        if ($row['roles'] === "usermanagement") {
            header("Location: userManagement.php");
            exit;
        }

        header("Location: accueil.php");
        exit;

    } else {
        // Mauvais login ou mauvais mot de passe
        $message = "Identifiants incorrects";
    }
}
?>
