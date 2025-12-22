<?php
require_once "../database/config.php";

$result = mysqli_query($cnx,"SELECT COUNT(*) FROM animaux;");
$total_animaux = mysqli_fetch_assoc($result);

$result = mysqli_query($cnx,"SELECT COUNT(*) FROM habitats ");
$total_habitat = mysqli_fetch_assoc($result);
?>