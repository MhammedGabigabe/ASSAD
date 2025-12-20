<?php
require_once "..\database\config.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    $nom = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $role = $_POST['role'];
    $mdp = $_POST['password'];

    $mdp_hash = password_hash($mdp, PASSWORD_DEFAULT);
    
    $requete = "INSERT INTO utilisateurs (nom, email, role, mdp_hash) VALUES (?,?,?,?);";
    $stmt = mysqli_prepare($cnx, $requete);

    mysqli_stmt_bind_param($stmt,'ssss', $nom, $email, $role, $mdp_hash);

    if (mysqli_stmt_execute($stmt)) {
         header("Location: login.php");
         exit;
    } else {
        if (mysqli_errno($cnx) == 1062) {
            echo "Email déjà utilisé !";
        } else {
            echo "Erreur serveur : " . mysqli_error($cnx);
        }
    }

    mysqli_stmt_close($stmt);

}

?>