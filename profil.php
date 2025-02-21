<?php
session_start();
include "./includes/header.php";
include "./includes/navbar.php";

?>
<h1>profil de <?php $_SESSION["user"]["pseudo"] ?> </h1>

<p>Email : <?php $_SESSION["user"]["email"] ?></p>
<p>