<?php
require_once "code_source/database/config.php";

$result = mysqli_query($cnx, "SELECT DISTINCT`pays_origine` FROM `animaux`");
$liste_pays_animaux = [];
if($result){
    $liste_pays_animaux = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

$result = mysqli_query($cnx, "SELECT * FROM animaux");
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

$liste_animaux = [];
if($result){
    while($enregistrement = mysqli_fetch_assoc($result)){
        $liste_animaux[] = $enregistrement;
    }
}

?>