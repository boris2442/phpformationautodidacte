<?php
$fichier = "Screenshot.png";
$image = __DIR__ . "/uploads/" . $fichier;

//on recupere donc les infos de l'image;

$infos = getimagesize($image);


switch ($info["mime"]) {

    case "image/png":
        //on ouvre l'image png
        $imageSource = imagecreatefrompng($image);
        break;

    case "image/jpeg":
        //on ouvre l'image
        $imageSource = imagecreatefromjpeg($image);
        break;

    case "image/gif":
        //on ouvre l'image
        $imageSource = imagecreatefromgif($image);
        break;

    default:
        die("ce n'est pas une image valide car le format est incorrect!");
}

//on recadre l'image avec imagecrop
// $nouvelleImage=imagerotate($imageSource, 45, 0); 
    // "x"=>200,
    // "y"=>200,
    // "width"=>300,
    // "height"=>300                   

//on retournement
imageflip($imageSource, IMG_FLIP_HORIZONTAL );
switch ($infos["mime"]) {

    case "image/png":
        //enregistrer l'image dans le serveur

        //nouvelle image + emplacement ou on veut stocker
        imagepng($nouvelleImage, __DIR__."/uploads/Screenshot.png");
        break;

    case "image/jpeg":
        imagejpeg($nouvelleImage, __DIR__."/rotate/Screenshot.png");
        break;

    case "image/gif":
        imagegif($nouvelleImage, __DIR__."/rotate/Screenshot.png");
        break;

    // default:
    //     die("ce n'est pas une image valide car le format est incorrect!");
}

//on detruire les images dans la memoire
imagedestroy($imageSource);
imagedestroy($nouvelleImage);
