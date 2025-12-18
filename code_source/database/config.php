<?php 

$server = "localhost";
$user = "root";
$password = "";
$database = "zoo_assad";

$cnx = mysqli_connect($server,$user,$password,$database);

if(!$cnx){
    die("Erreur de connexion à la base de données :" .mysqli_connect_error());
}

?>