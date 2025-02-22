<?php
// echo "<pre>";
// var_dump($_FILES);
// echo "</pre>";
// die;
//verifier  si un fichier a ete envoyer
if (isset($_FILES["images"]) && $_FILES["images"]["error"] === 0) {
    var_dump($_FILES);
    //proceder aux verifications
    //on verifie toujous l'extention et le type mine
    $allowed=[
    "jpg"=>"image/jpeg",
    "jpeg"=>"image/jpeg",
    "png"=>"image/png",
    "pdf"=>"image/pdf"
   ];
   $filename=$_FILES["images"]["name"];
   $filetype=$_FILES["images"]["type"];
   $filesize=$_FILES["images"]["size"];
   //on verifie si la taille du fichier est inferieure a 1Mo
   $extension=pathinfo($filename, PATHINFO_EXTENSION);
   //on verifie si l'extention est autorise
   if(!array_key_exists($extension, $allowed)||(!in_array($filetype, $allowed))){
    //soit l'extension  soit le type est incorrect
       die("le type de fichier n'est pas autorise");
   }
   //le type est correct!
   //on pourrait verifier la taill du fichier
   if($filesize >2*1024*1024){
    die("la taille du fichier ne doit pas exceder 2mo ");
   }
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