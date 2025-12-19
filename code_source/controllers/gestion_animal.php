<?php
include('code_source/database/config.php');

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

?>