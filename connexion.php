<?php
if (!empty($_POST)) {
    if(isset($_POST["email"], $_POST["pass"])
     && (!empty($_POST["email"])) && (!empty($_POST["pass"]))){

       if(!filter($_POST["email"], FILTER_VALIDATE_EMAIL)){
        die("email is not a valid email address");
       }
         include "./crud/index.php";
         $sql="SELECT * FROM `users` WHERE `email`=:email";
         $query=$db->prepare($sql);
            $query->bindValue(":email", $_POST["email"], PDO::PARAM_STR);
          $query->execute();
          $user=$query->fetch();
          if(!$user){
             die("email ou mot de pass incorrect");
          }
          if(!password_verify($_POST["pass"], $user["pass"])){
              die("email ou mot de pass incorrect");
          }

             session_start();
             //stocker dans $SESSION les informations 
             $SESSION["user"]=
             [
                    "id"=>$user["id"],
                    "email"=>$user["email"],
                    "pseudo"=>$user["pseudo"]
             ];
             //on peut rediriger vers la page de profil
             header("location:profil.php");


    }


    $titre = "ajouter un article";
    include "../includes/header.php";
    include "../includes/navbar.php";

?>

<h1>Ajouter un article</h1>

<form action="" method="post">
    
    <div class="">
        <label for="email">email</label>
        <input type="email" name="email" id="email">
    </div>
    <div class="">
        <label for="pass">mot de pass</label>
        <textarea name="pass" id="pass"></textarea>
    </div>

    <button type="submit">Me conecter</button>

</form>


<?php
include "../includes/footer.php";
?>

