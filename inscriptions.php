<?php
session_start();
if(isset($_SESSION["user"])){
    header("location:profil.php");
    exit();
}

if (!empty($_POST)) {
    if (
        isset($_POST["pseudo"], $_POST["pass"], $_POST["email"])
        && (!empty($_POST["pseudo"])) && (!empty($_POST["pass"]))
        && (!empty($_POST["email"]))
    ) {
        $name=strip_tags($_POST["pseudo"]);
        // $pass=htmlspecialchars($_POST["pass"]);
        // $email=htmlspecialchars($_POST["email"]);
        if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
            // $email=strip_tags($_POST["email"]);
            die("l'adresse e mail est invalide!");
        }
        // else{
        //     $email=strip_tags($_POST["email"]);
        // }
        $pass=password_hash($_POST["pass"], PASSWORD_ARGON2ID);
        
        include "../crud/index.php";
        $sql = "INSERT INTO `users` (`pseudo`, `email`, `password`) VALUES(:pseudo, :email, '$pass')";
        $requete = $db->prepare($sql);
        $requete->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
        $requete->bindValue(":email", $email, PDO::PARAM_STR);
       $requete->execute();
       //conexion
       //recuperation id
       $id=$db->lastInsertId();


       session_start();
       //stocker dans $SESSION les informations 
       $SESSION["user"]=
       [
              "id"=>$id,
              "email"=>$_POST["email"],
              "pseudo"=>$_POST["pseudo"]
       ];
       //on peut rediriger vers la page de profil
       header("location:profil.php");


    }else{
        die("le formulaire est incomplet");
    }


    $titre = "ajouter un article";
    include "../includes/header.php";
    include "../includes/navbar.php";

?>

<h1>Ajouter un article</h1>

<form action="" method="post">
    <div class="">
        <label for="pseudo">pseudo/label>
            <input type="text" name="pseudo" id="title">
    </div>
    <div class="">
        <label for="email">email</label>
        <input type="email" name="email" id="email">
    </div>
    <div class="">
        <label for="pass">mot de pass</label>
        <textarea name="pass" id="pass"></textarea>
    </div>

    <button type="submit">S'enregistrer</button>

</form>


<?php
include "../includes/footer.php";
?>

