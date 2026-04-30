<?php

// set in backend/colonne_afficher_naissance.php  , get in backend/colonne_suppprimer_acte.php
$_SESSION["v"]= $p;
// set in backend/ecritureBD_insertionSQL.php  , get in ecritureBD.php
$_SESSION["showInLive"]=$acte;// Pour le bouton "Afficher l'acte" // $acte=$_POST['acte'];
?>
