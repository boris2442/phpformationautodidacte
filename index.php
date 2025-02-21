<?php
$titre="accueil";
include "./includes/header.php";
include "./includes/navbar.php";

?>
<p>contenu de la page d'accueil</p>
<?php

include_once "./crud/index.php";

$email="aubin@gmail.com";
$password="aubin";




$sql="SELECT * FROM `users` WHERE `pass`='aubin' AND `email`='aubin@gmail.com'";
$requete=$db->query($sql);
$user=$requete->fetchAll();





include "./includes/footer.php";


?>