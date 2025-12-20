<?php
session_start();
require_once "../database/config.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $requete = "SELECT * FROM utilisateurs WHERE email = ?";
    $stmt = mysqli_prepare($cnx, $requete);

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) === 1) {

        $user = mysqli_fetch_assoc($result);
        if (password_verify($password, $user['mdp_hash'])) {
            if($user['is_active'] == 0){
                $_SESSION['error'] = "Ce compte est désactivé.";
                header("Location: ../views/login.php");
                exit;
            }else{
                //session_regenerate_id(true);
                $_SESSION['id_utilisateur'] = $user['id_utilisateur'];
                $_SESSION['nom'] = $user['nom'];
                $_SESSION['role'] = $user['role'];

                switch($user["role"]){
                    case 'Admin':
                        header("Location: ../views/admin_dashboard.php");
                        break;
                    case 'Guide':
                        header("Location: ../views/guide_dashboard.php");
                        break;
                    default:
                        header("location: ../../index.php");                      
                }
                exit();
            }
        } else {
            $_SESSION['error'] = "Mot de passe incorrect.";
            header("Location: ../views/login.php");
            exit;
        }

    } else {
        $_SESSION['error'] = "Email introuvable.";
        header("Location: ../views/login.php");
        exit;
    }   
    mysqli_stmt_close($stmt);
}

?>