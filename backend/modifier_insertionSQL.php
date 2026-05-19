<?php
session_start();
require_once("connection_PDO.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Récupération de l'ID envoyé par le formulaire
    $id = $_POST['suprim'] ?? null;

    if ($id === null) {
        $_SESSION['message'] = "Erreur : ID manquant.";
        header("Location: ../modifier_.php");
        exit();
    }

    // Récupération des champs
    $nom = $_POST["nom"];
    $prefecture = $_POST["prefecture"];
    $centretatcivil = $_POST['centretatcivil'];
    $registre = $_POST["registre"];
    $acte = $_POST['acte'];
    $date_acte = $_POST['date_acte'];

    $prenom = $_POST["prenom"];
    $delivre_a = $_POST['delivre_a'];
    $delivre_le = $_POST['delivre_le'];
    $delivre_an = $_POST['delivre_an'];
    $num_serie = $_POST['num_serie'];

    $naissance_jour_moi = $_POST['naissance_jour_moi'];
    $naissance_an = $_POST['naissance_an'];
    $naissance_heure = $_POST['naissance_heure'];
    $naissance_minuite = $_POST['naissance_minuite'];
    $naissance_nom_prenom = $_POST['naissance_nom_prenom'];
    $naissance_lieu = $_POST['naissance_lieu'];
    $naissance_sexe = $_POST['naissance_sexe'];

    $pere_nom_prenom = $_POST['pere_nom_prenom'];
    $pere_datenaisance = $_POST['pere_datenaisance'];
    $pere_lieunaissance = $_POST['pere_lieunaissance'];
    $pere_profession = $_POST['pere_profession'];
    $pere_villederesidence = $_POST['pere_villederesidence'];

    $mere_nom_prenom = $_POST['mere_nom_prenom'];
    $mere_datenaisance = $_POST['mere_datenaisance'];
    $mere_lieunaissance = $_POST['mere_lieunaissance'];
    $mere_profession = $_POST['mere_profession'];
    $mere_villederesidenc = $_POST['mere_villederesidenc'];

    $declaration_faite_par = $_POST['declaration_faite_par'];
    $datejugement = $_POST['datejugement'];
    $declaration_recue_pa = $_POST['declaration_recue_pa'];

    // Requête UPDATE
    $sql = "UPDATE liste SET 
        nom=?, prefecture=?, centretatcivil=?, registre=?, acte=?, date_acte=?, 
        prenom=?, delivre_a=?, delivre_le=?, delivre_an=?, num_serie=?, 
        naissance_jour_moi=?, naissance_an=?, naissance_heure=?, naissance_minuite=?, 
        naissance_nom_prenom=?, naissance_lieu=?, naissance_sexe=?, 
        pere_nom_prenom=?, pere_datenaisance=?, pere_lieunaissance=?, pere_profession=?, pere_villederesidence=?, 
        mere_nom_prenom=?, mere_datenaisance=?, mere_lieunaissance=?, mere_profession=?, mere_villederesidenc=?, 
        declaration_faite_par=?, datejugement=?, declaration_recue_pa=?
        WHERE ID=?";

    $q = $conn->prepare($sql);
    $accent = $q->execute([
        $nom, $prefecture, $centretatcivil, $registre, $acte, $date_acte,
        $prenom, $delivre_a, $delivre_le, $delivre_an, $num_serie,
        $naissance_jour_moi, $naissance_an, $naissance_heure, $naissance_minuite,
        $naissance_nom_prenom, $naissance_lieu, $naissance_sexe,
        $pere_nom_prenom, $pere_datenaisance, $pere_lieunaissance, $pere_profession, $pere_villederesidence,
        $mere_nom_prenom, $mere_datenaisance, $mere_lieunaissance, $mere_profession, $mere_villederesidenc,
        $declaration_faite_par, $datejugement, $declaration_recue_pa,
        $id
    ]);
	
	// Message de confirmation

    if ($accent) {
        $_SESSION['message'] = "Modification effectuée avec succès !";
    } else {
        $_SESSION['message'] = "Erreur lors de la modification.";
    }
	
	$_SESSION['flash_ready'] = true;

    // Redirection vers la page de modification AVEC l'ID
    header("Location: ../modifier_.php?n=$id");
    exit();
}
?>
