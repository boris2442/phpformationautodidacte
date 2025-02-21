<?php
// echo "<pre>";
// var_dump($_FILES);
// echo "</pre>";
// die;
//verifier  si un fichier a ete envoyer
if($_FILES["images"])&& $_FILES["images"]["0"]===){
    
}



?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>ajout de fichier</h1>
<form action="" method="post" enctype="multipart/form-data">
<div class="">
    <label for="fichier">Fichier</label>
    <input type="file" name="images" id="fichier" multiple accept="">
    <button type="submit">Envoyer</button>
</div>
<div class="">
    <label for="fichier">Fichier</label>
    <input type="file" name="files" id="fichier">
    <button type="submit">Envoyer</button>
</div>






</form   
</body>
</html>
>