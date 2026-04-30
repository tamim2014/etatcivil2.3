
<?php
// NOUS SOMMES CÔTE backend
session_start();

//Défintion des varibles: ATTENTION! LE FAIRE TOUJOURS AVANT LA CONNEXION

//$pr=$_GET['pr'];
$pr = isset($_GET['pr']) ? trim($_GET['pr']) : '';

$pr=ltrim($pr);// Voilà la solution MASHA ALLAH. Un espace s'est glissé en début de chaîne, il fallait le supprimer
//$pr=rtrim($pr);// pour supprimer un eventuel espace en fin de chaîne
	
// On enleve l'echappement si get_magic_quotes_gpc est active
// Mais attention:  la fonction 🔍get_magic_quotes_gpc()🔍 n'existe plus depuis PHP 7.4 
// ❌ On peut donc supprimer ce bloc de code.
if (function_exists('get_magic_quotes_gpc') && get_magic_quotes_gpc()) 
{
	$_GET['pr'] = stripslashes($_GET['pr']);
}


$_SESSION['pref']=$pr; // Pour pouvoir afficher la colonne "Imprimer" dans le panel  "yivawo"  tjrs dans la mm prefecture

//1.Connexion
require_once  'connection_PDO.php';

//2.Requête

// $requete='SELECT * FROM liste WHERE prefecture="'.$pr.'"';
// ❌ LE PROBLEME1:Pourquoi Mysql ne voit pas la variable $pr  ? 
// ✅SOLUTION(3 jours de galère mais résolu par ltrim)=> supprimer l'espace en début de chaîne:$pr=ltrim($pr); 
// ❌ LE PROBLEME2: Risque d'une injection SQL. Aujourd’hui, c’est totalement interdit.
// ✅SOLUTION => utiliser une requête préparée :

$requete = $conn->prepare("SELECT * FROM liste WHERE prefecture = :pr");
$requete->execute(['pr' => $pr]);


//La connaissance vient de l'expérience.Le reste n'est que information
//$reponse = $conn->query($requete) ;//Stockage de la requête dans une variable tampon
$reponse = $requete; // déjà exécutée ( avec la reqête préparée, pas besoin de $conn->query($requete)

//3.Affichage

//3.1 On construit une table d'affichage
$table='<table class="couleurPoliceTable">'; 
$table.='<tr class="tetetable" ><th>Nom </th><th> Prenom </th><th> Numéro </th><th> Prefecture </th><th>Imprimer</th><th style="border-radius:8px 0 8px 8px;">Afficher</th> <tr>';
while($ligne = $reponse->fetch()){// en utlisant FOREACH ça marche pas .j'sais pas pourquoi
 
 //$table.='<tr><td>'.$ligne["nom"].'</td><td>'.$ligne["prenom"].'</td><td>'.$ligne["acte"].'</td><td>'.$ligne["prefecture"].'</td><td><a href="imprimer.php?n='.$ligne["ID"].'">Imprimer</a></td><td><a href="afficher.php?n='.$ligne["ID"].'" onclick=" window.open(this.href, \'Popup\', \'scrollbars=1,resizable=1,height=409,width=918 ,  top=258, left=175 \'); return false;">Afficher</a></td></tr>';
 //👉 TASK1: il faut mettre le popup dans une fonction ( J'ai mis la fonction dans ⚠️js/lectureBD.js⚠️)
 //$table.='<tr><td>'.$ligne["nom"].'</td><td>'.$ligne["prenom"].'</td><td>'.$ligne["acte"].'</td><td>'.$ligne["prefecture"].'</td><td><a href="imprimer.php?n='.$ligne["ID"].'">Imprimer</a></td><td><a href="afficher.php?n='.$ligne["ID"].'" onclick="return ouvrePop(this.href);">Afficher</a></td></tr>';

$table .= '<tr>
<td>'.$ligne["nom"].'</td>
<td>'.$ligne["prenom"].'</td>
<td>'.$ligne["acte"].'</td>
<td>'.$ligne["prefecture"].'</td>

<td>
    <span class="icon-btn" onclick="window.location=\'imprimer.php?n='.$ligne['ID'].'\'">🖨️</span>
</td>

<td>
    <span class="icon-btn" onclick="ouvrePop(\'afficher.php?n='.$ligne['ID'].'\')">👁️</span>
</td>

</tr>';

 }
$table.='</table>';
//3.2 on vide $pr et on libere la memoir occupée par cet "interrogation backend"
unset($pr);

$reponse->closeCursor(); // mysql_close(); i parait que ça sert à rien puisque MySQL le fait tout seul
//3.3 On affiche le résultat

echo $table;

?>




