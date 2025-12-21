<?php
require_once "../database/config.php";

$result = mysqli_query($cnx, "SELECT * FROM utilisateurs where role != 'admin';");
$liste_utilisateurs = [];
if($result){
    $liste_utilisateurs = mysqli_fetch_all($result, MYSQLI_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_POST['approuver'])){
        $id = $_POST['approuver'];
        mysqli_query($cnx,"UPDATE utilisateurs SET is_approuve = 1 WHERE id_utilisateur = $id");
    }

    if(isset($_POST['desactiver'])){
        $id = $_POST['desactiver'];
        mysqli_query($cnx, "UPDATE utilisateurs SET is_active = 0 WHERE id_utilisateur = $id");
    }

    if(isset($_POST['activer'])){
        $id = $_POST['activer'];
        mysqli_query($cnx, "UPDATE utilisateurs SET is_active = 1 WHERE id_utilisateur = $id");
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>