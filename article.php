<?php
@include "/crud/index.php";

if(!isset($_GET["id"]) || (empty($_GET["id"]))){
    header("Location:article.php");
exit;
}
$id=$_GET["id"];

$sql="SELECT*FROM `articles` WHERE 'id'=:id";
$requete=$db->prepare($sql);
$requete->bindValue(":id",$id, PDO::PARAM_INT);
$requete->execute();
$article=$requete->fetch();

if(!$article){
    http_response_code(404);
    echo "Articles inexistant";
    exit;
}



$sql = "SELECT * FROM `articles` ORDER BY `created_at` DESC";
$requete = $db->query($sql);
$articles = $requete->fetchAll();


$titre = "Listes des articles";
@include "./includes/header.php";
@include "./includes/navbar.php";


?>
<h1>contenu de la page d'accueil</h1>


    <section>

        <article>
            <h1> <a href="article.php?id="><?php strip_tags($article["title"]) ?><a/></h1>
            <p>Publié le date <?php $article["create_at"]?></p>
            <div><? $article["content"]?></div>
            
        </article>
     
    </section>






<?php
@include "./includes/footer.php";


?>