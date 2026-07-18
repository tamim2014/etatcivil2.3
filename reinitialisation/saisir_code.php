<?php
session_start();

// Si l'utilisateur n'est pas connecté → retour login
if (!isset($_SESSION['user_id'])) {
    header("Location: ../backend/authentification.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, roles-scalable=yes">
    <title>Vérification du code </title>
	<link href="../css/template.css"  rel="stylesheet" type="text/css" >
	<link href="../css/accueil22.css" rel="stylesheet"/>
	<link href="../css/saisir_code.css" rel="stylesheet"/>
</head>

<body >
    <header>
		<div class="en-tete">
			<div class="hollowTop">				   
			   <input class="flag" type="image" src="../img/drapeau.png" align="left"/>
			   <p class="text_header">OFFICE  D&apos;ÉTAT CIVIL </p>			  
			</div> 
		</div>		

    </header>
    <div class="contenu"  >
	
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
				echo '<p class="error">Code incorrect ou expiré</p>';
			}
			?>

		</div>
    </div> 

	
    <div class="footer">
        <p>
		    <span>2026 &copy; -</span> 
			<span>Etat civil</span>
		</p>
    </div>
</body>
</html>




 

