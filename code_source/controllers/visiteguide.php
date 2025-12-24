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

if (isset($_POST['Ajouter'])) {
    
    $titre = trim($_POST['titre']);
    $description = trim($_POST['description']);
    $date_heure = $_POST['date_heure']; 
    $duree = (int)$_POST['duree']; 
    $langue = trim($_POST['langue']);
    $capacite_max = (int)$_POST['capacite_max'];
    $prix = (float)$_POST['prix'];

    
    $stmt = mysqli_prepare($cnx, "INSERT INTO visitesguidees 
        (titre, description, date_heure, duree, langue, capacite_max, prix, id_guide) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    mysqli_stmt_bind_param($stmt, "sssisidi", 
        $titre, $description, $date_heure, $duree, $langue, $capacite_max, $prix, $id_utilisateur);

    mysqli_stmt_execute($stmt);  

    header("Location: ../views/guide_dashboard.php");
    exit;
}

$visite_a_modifier = null;
 if(isset($_POST['modifier'])){
        $id = $_POST['modifier'];

        $result = mysqli_query($cnx, "SELECT * FROM visitesguidees WHERE id_visite = $id;");
        $visite_a_modifier = mysqli_fetch_assoc($result);
 }

if (isset($_POST['appliquerModi'])) {
    $idVisite = $_POST['appliquerModi'];
    
    $titre = trim($_POST['titre']);
    $description = trim($_POST['description']);
    $date_heure = $_POST['date_heure']; 
    $duree = (int)$_POST['duree']; 
    $langue = trim($_POST['langue']);
    $capacite_max = (int)$_POST['capacite_max'];
    $prix = (float)$_POST['prix'];

    
    $stmt = mysqli_prepare($cnx, "UPDATE visitesguidees 
                                  SET titre = ?, description = ?, date_heure = ?, duree = ?, langue = ?, capacite_max = ?, prix = ?
                                  WHERE id_visite =?; ");

    mysqli_stmt_bind_param($stmt, "sssisidi", 
        $titre, $description, $date_heure, $duree, $langue, $capacite_max, $prix, $idVisite);

    mysqli_stmt_execute($stmt);  

    header("Location: ../views/guide_dashboard.php");
    exit;
}

?>