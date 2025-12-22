<?php
require_once __DIR__ . '/../database/config.php';

$result = mysqli_query($cnx, "SELECT DISTINCT`pays_origine` FROM `animaux`");
$liste_pays_animaux = [];
if($result){
    $liste_pays_animaux = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

$result = mysqli_query($cnx, "SELECT a.*,ha.nom AS habitat FROM animaux a INNER JOIN habitats ha ON a.id_habitat = ha.id_habitat");
$liste_animaux = [];
if($result){
    $liste_animaux = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// filtrer

$habitat_filter = isset($_POST['habitat']) ? $_POST['habitat'] : '' ;
$pays_filter = isset($_POST['pays']) ? $_POST['pays'] : '';

$requete = "select * 
            from animaux a
            where 1=1";

if($habitat_filter != '' ){
    $requete.= " and id_habitat = $habitat_filter";
}

if($pays_filter != ''){
    $requete.= " and pays_origine = '$pays_filter'";
}

$requete.= " order by a.id_animal ASC;";
$result = mysqli_query($cnx,$requete);

//insertion
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['ajouter'])){
        $nom = trim($_POST['nom']);
        $espece = trim($_POST['espece']);
        $id_habitat = $_POST['id_habitat'];
        $alimentation = $_POST['alimentation'];
        $image = trim($_POST['image']);
        $pays = trim($_POST['pays']);
        $description = trim($_POST['description']);

        $requete = "INSERT INTO animaux( nom, espece, alimentation, image, pays_origine, description_courte, id_habitat) 
                    VALUES (?,?,?,?,?,?,?)";
        $stmt = mysqli_prepare($cnx, $requete);

        mysqli_stmt_bind_param($stmt, "ssssssi", $nom, $espece, $alimentation, $image, $pays, $description, $id_habitat);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location: ../views/gestion_animal.php");
        exit;
    }
}

$animal_a_modifier = null;
// recupperer animal a modifier
 if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['open_modalModifier'])){
        $id = $_POST['open_modalModifier'];

        $result = mysqli_query($cnx, "SELECT * FROM animaux WHERE id_animal = $id;");
        $animal_a_modifier = mysqli_fetch_assoc($result);
 }

//modification
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['btn_modifier'])){
        $id = $_POST['btn_modifier'];
   
        $nom = trim($_POST['nom']);
        $espece = trim($_POST['espece']);
        $id_habitat = $_POST['id_habitat'];
        $alimentation = $_POST['alimentation'];
        $image = trim($_POST['image']);
        $pays = trim($_POST['pays']);
        $description = trim($_POST['description']);

        $requete = "UPDATE animaux 
                    SET nom = ?,espece = ?,alimentation = ?,image= ?,pays_origine= ?,description_courte = ?,id_habitat = ? 
                    WHERE id_animal= ?;";
        $stmt = mysqli_prepare($cnx, $requete);

        mysqli_stmt_bind_param($stmt, "ssssssii", $nom, $espece, $alimentation, $image, $pays, $description, $id_habitat, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location: ../views/gestion_animal.php");
        exit;
    
}

//suppression
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if(isset($_POST['supprimer'])){
        $id = $_POST['supprimer'];
        mysqli_query($cnx, "DELETE FROM animaux WHERE id_animal = $id;");
        header("Location: ../views/gestion_animal.php");
        exit;
    }
}



?>