<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, roles-scalable=yes">
    <title>Mot de passe réinitialisé</title>
    <style>
        body { 
            font-family: Arial; 
            background: #E8E4D8; /* #f5f5f5; */
        }
		/*
        .box {
            width: 350px;
            margin: 80px auto;
            padding: 25px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px #ccc;
            text-align: center;
        }
		*/
		.box {
			max-width: 350px;
			width: 90%; /*  ← eviter le scroll sur mobil */
			margin: 80px auto;
			padding: 25px;
			/* padding-right: 35px;   ← espace réservé pour le X */
			background: white;
			border-radius: 8px;
			box-shadow: 0 0 10px #ccc;
			text-align: center;
			position: relative; /* ← OBLIGATOIRE  */
		}
		
		
		
		
        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #558C89; /* #007bff; */
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        a:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>Mot de passe réinitialisé</h2>
    <p>Votre mot de passe a été mis à jour avec succès.</p>
    <p>Vous pouvez maintenant vous reconnecter.</p>

    <a href="../index.php">Se connecter</a>
</div>

</body>
</html>
