<?php
$ch=$_POST["ch"];
$valider=$_POST["valider"];
if(isset($valider)){
    echo "vous avez cocher les cases suivantes!</br>";
    echo implode("")
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
        <input type="checkbox" name="ch[]" id="" value="HTML">HTML</br>
        <input type="checkbox" name="ch[]" id="" value="CSS">CSS</br>
        <input type="checkbox" name="ch[]" id="" value="Javascript">Javascript</br>
        <input type="checkbox" name="Valider" id="" value="Envoyer">

    </form>
</body>
</html>