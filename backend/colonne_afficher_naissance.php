
<?php
/******************
*
*author: Andjib
*date: 16/05/2018
*
******************/
// NOUS SOMMES CÔTE backend
session_start();
//Défintion des varibles: ATTENTION "  LE FAIRE TOUJOURS AVANT LA CONNEXION"


/*
 * Réception du filtre "prefecture" 
 * transmis par la fonction AJAX showActeLinkSlide(str) . 
 * fonction obsolete remplacée par captureCombo(str)
 */
if(!isset($_GET["p"])) $_GET["p"]=""; 
$p = $_GET['p']; 

//1.Connexion
require_once 'connection_mysqli.php';

//2.Récupération des données de la base(par construction d'une variables php de stockage tampon)  

// $R=mysqli_query($conn, "SELECT * FROM  liste WHERE prefecture='".$p."' ") or exit(mysql_error($conn ));

// ❌ Restriction d'accès aux données: Chaque officier accède seulement à sa prefecture
if ($_SESSION['user_role'] !== 'admin') {
	// Si ce n'est pas un admin: On force la prefecture(on la restreint à une seule valeur possible)
	$prefUnique = $_SESSION['prefecture'];
	$R=mysqli_query($conn, "SELECT * FROM  liste WHERE prefecture='".$prefUnique."' ") or exit(mysql_error($conn ));
    // Message
    if($p !== $prefUnique){
		echo "Accès restreint à la préfecture de: <b>".$prefUnique."</b>";
		exit;
	}
} else {
	$R=mysqli_query($conn, "SELECT * FROM  liste WHERE prefecture='".$p."' ") or exit(mysql_error($conn ));
}


//3.Affichage
//3.1 On construit un tableau de présentation des données
$table='<table class="couleurPoliceTable">'; 
$table.='<tr><th>Nom</th><th>Prenom</th><th>Numero</th><th>Prefecture</th><th></th><tr>';
while($ligne=mysqli_fetch_array($R)){// en utlisant FOREACH ça marche pas .j'sais pas pourquoi
  //$table.='<tr><td>'.$ligne["nom"].'</td><td>'.$ligne["prenom"].'</td><td>'.$ligne["acte"].'</td><td>'.$ligne["prefecture"].'</td> <td><a href="afficher.php?n='.$ligne["ID"].'"  onclick="window.open(this.href, \'Popup\', \'scrollbars=1,resizable=1,height=409,width=918 ,  top=258, left=175 \'); return false;">Afficher</a></td></tr>';
  // Remplacer afficher.php par afficherdanspop.php(qui est déjà formaté)
  $table .= '<tr>
  <td>'.$ligne["nom"].'</td>
  <td>'.$ligne["prenom"].'</td>
  <td>'.$ligne["acte"].'</td>
  <td>'.$ligne["prefecture"].'</td>
  <td>
    <a class="icon-btn" href="output/afficher.php?n='.$ligne["ID"].'" onclick="return ouvrePop(this.href);">
        👁️
    </a>
  </td>
  </tr>';
  $_SESSION["v"]= $p; // stocke la prefecture pour la transmettre à la page rectifier naissance.php suite à un éventuel clic sur le bouton rectifier
   // $_SESSION['identifiant']= $ligne['ID']; // pour l'affichage du document. Voir afficherdanspop.php( don include pop.php)
}
$table.='</table>';

//3.2 on libère l'espace mémoire alloué pour cette interrogation de la base(ainsi on gagne en RAPIDITE)
mysqli_free_result ($R); 
mysqli_close($conn);
//3.3 on affiche le résultat
echo $table;

?>


