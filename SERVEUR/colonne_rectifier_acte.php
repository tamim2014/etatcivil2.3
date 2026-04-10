
<?php

session_start();// pour pouvoir recuperer $_SESSION["v"] càd la prefecture séléctionnée

//1.Connexion
require_once  'connection_PDO.php';

/*
 * A défaut d'une prefecture selectionné( $_SESSION["v"]): Aucune table ne peut s'ouvrir
 * ❌ => Un message d'erreur s'impose
 * ✅ => Cette condition corrige ce bug
 */ 
if (!isset($_SESSION["v"])) {
    echo "<script>alert('Veuillez ouvrir la table avant de traiter ses données ⚠️');</script>";
	exit;
}
// Gestion des droits utilisateurs sur la fonction Rectifier
if ($_SESSION["user_role"] !== "admin") {
    echo "<script>showDialog(\"M. <b>".$_SESSION["pseudo"]."</b>!&nbsp;&nbsp;Vous n\'avez pas les droits...\");</script>";
    exit;
}
//2.Récupération des données de la base(par construction d'une variables php de stockage tampon) 
$R = "SELECT * FROM liste WHERE prefecture='".$_SESSION["v"]."' ";
$R = $conn->query("SELECT * FROM  liste WHERE prefecture='".$_SESSION["v"]."' ");

//3.Affichage
$table='<table>'; 
$table.='<tr><th>Nom </th><th> Prenom </th><th> Numero </th><th> Prefecture </th><th>  </th></tr>';
while ($ligne2 = $R->fetch(PDO::FETCH_ASSOC)){
 $table.='<tr><td>'.$ligne2["nom"].'</td><td>'.$ligne2["prenom"].'</td><td>'.$ligne2["acte"].'</td><td>'.$ligne2["prefecture"].'</td> <td> <a href="modifier_.php? n='.$ligne2["ID"].' & nom_='.$ligne2["nom"].' & prenom_='.$ligne2["prenom"].' & acte_='.$ligne2["acte"].' ">Rectifier</a> </td></tr>';
}
$table.='</table>';
echo $table;
//mysqli_close($conn);
?>


