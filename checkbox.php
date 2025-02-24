<?php
@$ch=$_POST["ch"];
@$valider=$_POST["valider"];
if(isset($valider)){
    echo "vous avez cocher les cases suivantes!</br>";
    echo @implode("-", $ch);
    echo "<hr />";

    //se connecter a la base

    include_once "/crud/index.php";
    //apres , on cree une table a deux dimensions, id et competences

    // $requete= $db"INSERT INTO `competences` VALUES (?)";
    $requete=$pdo->prepare("INSERT INTO `competences` VALUES (?)");
    $requete->execute(array(implode("|", $ch)));
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkbox</title>
</head>
<body>
    <form action="" method="post">
        <input type="checkbox" name="ch[]" id="" value="HTML" <?php if(@in_array("HTML", $ch)) echo "checked" ?>>HTML</br>
        <input type="checkbox" name="ch[]" id="" value="CSS" <?php if(@in_array("CSS", $ch)) echo "checked" ?>>CSS</br>
        <input type="checkbox" name="ch[]" id="" value="Javascript" <?php if(@in_array("Javascript", $ch)) echo "checked" ?>>Javascript</br>
        <input type="checkbox" name="Valider" id="" value="Envoyer">

    </form>
</body>
</html>