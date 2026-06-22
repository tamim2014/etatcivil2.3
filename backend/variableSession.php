<?php

// set in: backend/authentification.php
// get in: backend/url_access_guard.php, reinitialisation.php, envoyer_code, verifier_code.php, saisir_code.php
$_SESSION['user_id']    = $row['ID'];

// set in: backend/authentification.php
// get in: backend/lectureBD2_searchPlayBack.php, backend/lectureBD2_searchPlayBackByName.php
$_SESSION['pseudo'] = $row['pseudo'];


// set in: backend/authentification.php
// get in: modifier_.php, backend/supprimer.php,  backend/colonne_rectifier_acte.php, backend/colonne_supprimer_acte.php
$_SESSION['user_role']  = $row['roles'];

// set in: backend/authentification.php
// get in: envoyer_code.php
$_SESSION["email"] = $row["email"]; // ← celui-là est crucial


// set in: backend/colonne_afficher_naissance.php (filtre "prefecture")   
// get in: backend/colonne_suppprimer_acte.php, colonne_rectifier_acte.php,  colonne_imprimer_acte.php, trier.php
$_SESSION["v"]= $p; 


// set in: backend/supprimer.php
// get in: accueil.php 
$_SESSION['messageDelete'] = "Suppression effectuée avec succès⚠️"; 


// Obsolete
// set in: backend/ecritureBD_insertionSQL.php  , 
// get in: ecritureBD.php
$_SESSION["showInLive"]=$acte;// Pour le bouton "Afficher l'acte" // $acte=$_POST['acte'];
?>
