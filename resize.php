<?php
$fichier = "Screenshot.png";
$image = __DIR__ . "/uploads/" . $fichier;

//on recupere donc les infos de l'image;

$infos = getimagesize($image);
echo "<pre>";
var_dump($infos);
echo "</pre>";

$largeur = $infos[0];
$hauteur = $infos[1];
//on va creer une nouvelle image vierge en memoire
$nouvelleImage = imagecreatetruecolor($largeur / 2, $hauteur / 2);

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

//on copie l'image source dans la l'image de destination

imagecopyresampled(
    $nouvelleImage, //image de destination
    $imageSource,     //image de depart
    0,        // 0:position en x du coin superieur dans l'image de destination

    0,   // 0:position en y du coin superieur dans l'image de destination
    0,  //position en x du coin superieur dans l'image source
    0,  //position en y du coin superieur dans l'image source
    $largeur / 2,  //largeur de l'image de destination
    $hauteur / 2,   //hauteur de l'image de destination
    $largeur,       //largeur de l'image source
    $hauteur        //hauteur de l'image souce
);


//enregistrer la nouvelle image sur le serveur

//pour cela, on refaire le switch

switch ($infos["mime"]) {

    case "image/png":
        //enregistrer l'image dans le serveur

        //nouvelle image + emplacement ou on veut stocker
        imagepng($nouvelleImage, __DIR__."/uploads/Screenshot.png");
        break;

    case "image/jpeg":
        imagejpeg($nouvelleImage, __DIR__."/uploads/Screenshot.png");
        break;

    case "image/gif":
        imagegif($nouvelleImage, __DIR__."/uploads/Screenshot.png");
        break;

    // default:
    //     die("ce n'est pas une image valide car le format est incorrect!");
}

//on detruire les images dans la memoire
imagedestroy($imageSource);
imagedestroy($nouvelleImage);



