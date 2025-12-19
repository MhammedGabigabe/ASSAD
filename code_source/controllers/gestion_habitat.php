<?php
include('code_source/database/config.php');


$result = mysqli_query($cnx, "SELECT * FROM habitats;");
$liste_habitats = [];
if($result){
    $liste_habitats = mysqli_fetch_all($result, MYSQLI_ASSOC);
}




?>