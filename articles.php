<?php
@include "/crud/index.php";

$sql = "SELECT * FROM `articles` ORDER BY `created_at` DESC";
$requete = $db->query($sql);
$articles = $requete->fetchAll();


$titre = "Listes des articles";
@include "./includes/header.php";
@include "./includes/navbar.php";


?>
<h1>contenu de la page d'accueil</h1>

<?php foreach ($articles as $article): ?>
    <section>

        <article>
            <h1><?php strip_tags($article["title"]) ?></h1>
            <p>Publié le date <?php $article["create_at"]?></p>
            <div><? $article["content"]?></div>
            
        </article>
        <?php endforeach;?>
    </section>






<?php
@include "./includes/footer.php";


?>