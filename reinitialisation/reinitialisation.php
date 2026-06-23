<?php
session_start();
require '../backend/connection_mysqli.php';

// 1. Vérifier que l'utilisateur est bien identifié
if (!isset($_SESSION['email'])) {
    die("Erreur : utilisateur non identifié.");
}

$email = $_SESSION['email'];

// 2. Si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $pass1 = trim($_POST['password'] ?? '');
    $pass2 = trim($_POST['confirm_password'] ?? '');

    // Vérifications
    if ($pass1 === '' || $pass2 === '') {
        $error = "Veuillez remplir tous les champs.";
    } elseif ($pass1 !== $pass2) {
        $error = "Les mots de passe ne correspondent pas.";
    } else {
        // 3. Hash du mot de passe
        $hash = password_hash($pass1, PASSWORD_DEFAULT);

        // 4. Mise à jour dans la table listeofficiers
        $sql = "UPDATE listeofficiers SET motdepasse = ? WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $hash, $email);
        $stmt->execute();

        // 5. Détruire la session (sécurité)
        session_destroy();

        // 6. Message de succès
        header("Location: success_reset.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, roles-scalable=yes">
    <title>Réinitialisation du mot de passe</title>
    <style>
        body { font-family: Arial; background: #f5f5f5; }
        .box {
            width: 350px;
            margin: 80px auto;
            padding: 25px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px #ccc;
            text-align: center;
        }
        input {
            width: 90%;
            padding: 10px;
            margin-top: 15px;
            font-size: 16px;
        }
        button {
            margin-top: 20px;
            padding: 10px 20px;
            background: #28a745;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }
        .error {
            color: red;
            margin-top: 15px;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Nouveau mot de passe</h2>

    <?php if (!empty($error)): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
        <input type="password" name="password" placeholder="Nouveau mot de passe" required>
        <input type="password" name="confirm_password" placeholder="Confirmer le mot de passe" required>
        <button type="submit">Valider</button>
    </form>
</div>

</body>
</html>
