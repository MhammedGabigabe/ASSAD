<?php
require_once __DIR__ . '/../database/config.php';


$result = mysqli_query($cnx, "SELECT * FROM habitats;");
$liste_habitats = [];
if($result){
    $liste_habitats = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

if (isset($_POST['supprimer'])) {
    $id_habitat = $_POST['supprimer']; 
    mysqli_query($cnx,"DELETE FROM habitats WHERE id_habitat = $id_habitat;");
    header("Location: ../views/gestion_habitats.php");
    exit;
}

$habitat_edit = null;
if (isset($_POST['modifier'])) {
    $id_habitat = $_POST['modifier'];
    $result = mysqli_query($cnx,"SELECT * FROM habitats WHERE id_habitat = $id_habitat;");
    $habitat_edit = mysqli_fetch_assoc($result); 
}

if (isset($_POST['ajouter'])) {
    $nom = trim($_POST['nom']);
    $description = trim($_POST['description']);
    $type_climat = trim($_POST['climat']);
    $zone_zoo = trim($_POST['zone']);

    if (!empty($_POST['id_habitat'])) {
        $id_habitat = $_POST['id_habitat'];
        $requete = "UPDATE habitats SET nom = ?, description = ?, type_climat = ?, zone_zoo = ? WHERE id_habitat = $id_habitat;";
        $stmt = mysqli_prepare($cnx, $requete);
        mysqli_stmt_bind_param($stmt,"ssss",$nom,$description,$type_climat,$zone_zoo);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        $requete = "INSERT INTO habitats (nom, description, type_climat, zone_zoo) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($cnx, $requete);
        mysqli_stmt_bind_param($stmt,"ssss",$nom,$description,$type_climat,$zone_zoo);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
    header("Location: ../views/gestion_habitats.php");
    exit;
}



?>