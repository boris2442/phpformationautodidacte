<?php
var_dump($_POST);
if (!empty($_POST)) {
    if (
        isset($_POST["title"], $_POST["content"])
        && !empty($_POST["title"]) && !empty($_POST["content"])
    ) {
        $titre = strip_tags($_POSt["titre"]);
        $content = htmlspecialchars($_POST["content"]);
        include "../crud/index.php";
        $sql = "INSERT INTO `articles` (`title`, `content`) VALUES(:title, :content)";
        $requete = $db->prepare($sql);
        $requete->bindValue(":title", $title, PDO::PARAM_STR);
        $requete->bindValue(":content", $content, PDO::PARAM_STR);

        if (! $requete->execute()) {
            die("une erreur est survenu");
        }

        $id = $db->lastInsertId();
        die("ajouter sur le numero $id");
    } else {
        die("le formulaire est incomplet");
    }
}
$titre = "ajouter un article";
include "../includes/header.php";
include "../includes/navbar.php";

?>

<h1>Ajouter un article</h1>

<form action="" method="post">
    <div class="">
        <label for="title">titre</label>
        <input type="text" name="title" id="title">
    </div>
    <div class="">
        <label for="content">titre</label>
        <textarea name="content" id="content"></textarea>
    </div>

    <button type="submit">S'enregistrer</button>

</form>

<?php
include "../includes/footer.php";

?>