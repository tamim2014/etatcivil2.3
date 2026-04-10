

<?php
 session_start(); // Recup de la prfecture dans  $_SESSION["v"]
//1.Connexion
require_once 'connection_mysqli.php';
/*
 * A défaut d'une prefecture selectionné( $_SESSION["v"]): Aucune table ne peut s'ouvrir
 * ❌ => Un message d'erreur s'impose
 * ✅ => Cette condition corrige ce bug
 */ 
if (!isset($_SESSION["v"])) {
   // echo "<script>showDialog('Veuillez ouvrir la table avant de traiter ses données !');</script>";
    echo "<script>alert('Veuillez ouvrir la table avant d\'imprimer les documents ⚠️');</script>";
    exit;
}

//2.Récupération des données de la base(par construction d'une variables php de stockage tampon)
$R=mysqli_query($conn , "SELECT * FROM  liste WHERE prefecture='".$_SESSION["v"]."' ") or exit(mysqli_error($conn ));
//3.Affichage
$table='<table>'; 
$table.='<tr><th>Nom </th><th> Prenom </th><th> Numero </th><th> Prefecture </th><th>  </th></tr>';
while($ligne2=mysqli_fetch_array($R)){// en utlisant FOREACH ça marche pas .j'sais pas pourquoi
	 //$table.='<tr><td>'.$ligne2["nom"].'</td><td>'.$ligne2["prenom"].'</td><td>'.$ligne2["acte"].'</td><td>'.$ligne2["prefecture"].'</td> <td> <a href="#" onclick="imprimer(this.value)">Imprimer</a> </td></tr>';
	  /**
	  la fonction onclick="imprimer(this.value) appelle un fichier SERVEUR/accueil_imprimer_acte.php" 
	  Je vais donc annuler cette fonction et activer href comme dans lectureBD.php
	  */
	$table.='<tr><td>'.$ligne2["nom"].'</td><td>'.$ligne2["prenom"].'</td><td>'.$ligne2["acte"].'</td><td>'.$ligne2["prefecture"].'</td> <td> <a href="imprimer.php?n='.$ligne2["ID"].'" >Imprimer</a> </td></tr>';
}
$table.='</table>';
echo $table;
mysqli_close($conn);
?>