<?php
 session_start(); // Pour le message confirmation suppression
 
 // Empêcher l'accès aux officiers non "admin"
 if ($_SESSION["user_role"] !== "admin") {
    exit("Accès refusé.");
 }
 
 
 $id = $_GET["n"];
 
 require_once 'connection_mysqli.php';
 
//1.Suppression
$r=mysqli_query($conn , "DELETE FROM liste WHERE  ID=' "  .$id. " ' " ); 
//confirmation de la suppression
if ($r) {
	// get in:  accueil.php
   $_SESSION['messageDelete'] = "Suppression effectuée avec succès ⚠️ "; 
} else {
  $_SESSION['messageDelete']= "Erreur lors de la suppression ⚠️ ";
}

//2.Réinitialiser  l'auto-incrément(si la table est vidée): 
mysqli_query($conn , "ALTER TABLE liste AUTO_INCREMENT=0 ");

//mysql_free_result($r);
mysqli_close($conn);

//3. Redirection 
header('Location: ../accueil.php');
exit();

?>