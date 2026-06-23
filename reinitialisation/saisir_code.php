<?php
session_start();

// Si l'utilisateur n'est pas connecté → retour login
if (!isset($_SESSION['user_id'])) {
    header("Location: authentification.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, roles-scalable=yes">
    <title>Vérification du code</title>
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
		   /*
			*   ⚠️ IMPORTANT  
			*	Assure-toi que ta .box a bien position: relative;  
			*	Sinon la croix ne se positionnera pas correctement.
			*/
			position: relative;
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
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        .error {
            color: red;
            margin-top: 10px;
        }
		
		/*  btn renvoyer le code */
		.btn-renvoyer {
			display: inline-block;
			margin-top: 10px;
			padding: 10px 20px;
			background: #ffc107;
			color: black;
			text-decoration: none;
			border-radius: 5px;
			font-size: 14px;
			cursor: pointer;
			transition: background 0.2s ease-in-out;
		}

		.btn-renvoyer:hover {
			background: #e0a800;
		}
		/* Style pour la croix (propre, moderne, UX-friendly)   */
		.close-btn {
			position: absolute;
			top: 10px;
			right: 15px;
			font-size: 24px;
			color: #333;
			text-decoration: none;
			font-weight: bold;
			cursor: pointer;
			transition: color 0.2s ease-in-out;
		}

		.close-btn:hover {
			color: #000;
		}


    </style>
</head>
<body>

<div class="box">
    <a href="../index.php" class="close-btn">×</a>
    <h2>Vérification du code</h2>
    <p>Veuillez entrer le code que vous avez reçu par email.</p>

    <form method="POST" action="verifier_code.php">
        <input type="text" name="code" placeholder="Code reçu" required>
        <button type="submit">Valider</button>
		<a href="envoyer_code.php" class="btn-renvoyer">Renvoyer le code</a>
    </form>
     <?php
    if (isset($_GET['error'])) {
        echo '<p class="error">Code incorrect ou expiré.</p>';
    }
    ?>

</div>

</body>
</html>
