<?php
$fichier = "Screenshot.png";
$image = __DIR__ . "/uploads/" . $fichier;

//on recupere donc les infos de l'image;

$infos = getimagesize($image);
$largeur=$infos[0];
$hauteur=$infos[1];
// $nouvelleImage=imagecreatetruecolor($largeur, $hauteur);

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
//on ouvre le logo

                                  //on recadre l'image avec imagecrop
                                  // $nouvelleImage=imagerotate($imageSource, 45, 0); 
                                      // "x"=>200,
                                      // "y"=>200,
                                      // "width"=>300,
                                      // "height"=>300                   

                                  //on retournement


$logo=imagecreatefromjpeg(__DIR__."/uploads/Screenshot.png");
$infosLogo=getimagesize(__DIR__."/uploads/Screenshot.png");


imagecopyresampled(
    $ImageSource, //image de destination
    $logo,     //image de depart
    $infos[0] -$infosLogo[0] -10 ,        // 0:position en x du coin superieur dans l'image de destination

    $infos[1]-$infosLogo[1] - 10,   // 0:position en y du coin superieur dans l'image de destination
    0,  //position en x du coin superieur dans l'image source
    1,  //position en y du coin superieur dans l'image source
    $infosLogo[0],  //largeur de l'image de destination
    $infosLogo[1],   //hauteur de l'image de destination
    $infosLogo[0],       //largeur de l'image source
    $infosLogo[1]       //hauteur de l'image souce
);








imageflip($imageSource, IMG_FLIP_HORIZONTAL );
switch ($infos["mime"]) {

    case "image/png":
        //enregistrer l'image dans le serveur

        //nouvelle image + emplacement ou on veut stocker
        imagepng($imageSource, __DIR__."/uploads/Screenshot.png");
        break;

    case "image/jpeg":
        imagejpeg($imageSource, __DIR__."/rotate/Screenshot.png");
        break;

    case "image/gif":
        imagegif($imageSource, __DIR__."/rotate/Screenshot.png");
        break;

    // default:
    //     die("ce n'est pas une image valide car le format est incorrect!");
}

//on detruire les images dans la memoire
imagedestroy($imageSource);
imagedestroy($nouvelleImage);
