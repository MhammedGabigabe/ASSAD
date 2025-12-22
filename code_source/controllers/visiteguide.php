<?php
require_once "../database/config.php";

session_start();

if (!isset($_SESSION['id_utilisateur'])) {
    header("Location: ../views/login.php");
    exit;
}

$id_utilisateur = $_SESSION['id_utilisateur'];
$result = mysqli_query($cnx,"SELECT * FROM visitesguidees WHERE id_guide = $id_utilisateur;");
$liste_visites = [];
if($result){
    $liste_visites = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

$result = mysqli_query($cnx,"SELECT COUNT(*) FROM `visitesguidees` WHERE id_guide = $id_utilisateur;");
$total_visites = mysqli_fetch_assoc($result);


if (isset($_POST['Supprimer'])) {
    $id_visite = $_POST['Supprimer']; 
    mysqli_query($cnx,"DELETE FROM visitesguidees WHERE id_visite = $id_visite;");
    header("Location: ../views/guide_dashboard.php");
    exit;
}
?>