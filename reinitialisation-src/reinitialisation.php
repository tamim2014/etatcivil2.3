<?php
session_start();
require_once 'backend/connection_mysqli.php';

// Vérifier que l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: authentification.php");
    exit;
}

$user_id = $_SESSION['user_id'];
$message = "";

// Si le formulaire est soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $mdp1 = $_POST['mdp1'] ?? '';
    $mdp2 = $_POST['mdp2'] ?? '';

    // 1) Vérification basique
    if (empty($mdp1) || empty($mdp2)) {
        $message = "Veuillez remplir les deux champs.";
    }
    elseif ($mdp1 !== $mdp2) {
        $message = "Les mots de passe ne correspondent pas.";
    }
    elseif (strlen($mdp1) < 6) {
        $message = "Le mot de passe doit contenir au moins 6 caractères.";
    }
    else {

        // 2) Hash sécurisé
        $hash = password_hash($mdp1, PASSWORD_DEFAULT);

        // 3) Mise à jour du mot de passe
        $sql = "UPDATE listeofficiers SET motdepasse = ? WHERE ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $hash, $user_id);
        $stmt->execute();

        // 4) Invalider tous les anciens codes
        $sql = "UPDATE reset_codes SET used = 1 WHERE user_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();

        // 5) Redirection finale
		$_SESSION['flash_success'] = "Votre mot de passe a été modifié avec succès !";
		header("Location: reinitialisation.php");
		exit;

    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Réinitialisation du mot de passe</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .box {
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            width: 320px;
            text-align: center;
        }
        input {
            width: 90%;
            padding: 10px;
            margin-top: 15px;
            border-radius: 5px;
            border: 1px solid #aaa;
        }
        button {
            margin-top: 20px;
            padding: 10px 20px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #1e7e34;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
		
		/* Flash */
		
		.flash-success {
			background: #d4edda;
			color: #155724;
			padding: 12px;
			border-radius: 5px;
			margin-bottom: 15px;
			border: 1px solid #c3e6cb;
			animation: fadeIn 0.4s ease-out;
		}

		@keyframes fadeIn {
			from { opacity: 0; transform: translateY(-5px); }
			to   { opacity: 1; transform: translateY(0); }
		}
		
		
		.btn-connexion {
			display: inline-block;
			margin-top: 10px;
			padding: 10px 20px;
			background: #6c757d;
			color: white;
			text-decoration: none;
			border-radius: 5px;
			font-size: 14px;
			border: none;
			cursor: pointer;
			transition: background 0.2s ease-in-out;
		}

		.btn-connexion:hover {
			background: #5a6268;
		}
		
		form button,
		form .btn-connexion {
			width: 100%;
			box-sizing: border-box;
		}



    </style>
</head>
<body>

<div class="box">
    <h2>Nouveau mot de passe</h2>
    <p>Veuillez saisir votre nouveau mot de passe.</p>
	
	<?php if (isset($_SESSION['flash_success'])): ?>
    <div class="flash-success">
        <?= $_SESSION['flash_success']; ?>
    </div>
    <?php unset($_SESSION['flash_success']); ?>
	<?php endif; ?>

	

	<form method="POST">
		<input type="password" name="mdp1" placeholder="Nouveau mot de passe" required>
		<input type="password" name="mdp2" placeholder="Confirmer le mot de passe" required>

		<button type="submit">Valider</button>

		<a href="index.php" class="btn-connexion">Connexion</a>
	</form>


    <?php if (!empty($message)) echo '<p class="error">'.$message.'</p>'; ?>
</div>

</body>
</html>
