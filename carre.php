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


//savoir si l'image est portrait ou l'image ou paysage ou carre

switch($largeur<=>$hauteur){
    case -1:
            //largeur<hauteur 
           $tailleCarre=$largeur; 
           $src_x=0;
           $src_y=($hauteur-$tailleCarre)/2;
        break;
    case 0:
              //largeur=hauteur
            $tailleCarre=$largeur;  
            $src_x=0;
            $src_y=0;
        break;
    case 1:
               //largeur>hauteur
               $tailleCarre=$hauteur;
               $src_x=($largeur - $tailleCarre)/2;
               $src_y=0;
        break;
}






//on va creer une nouvelle image vierge en memoire
$nouvelleImage = imagecreatetruecolor(200, 200);

switch ($info["mime"]) {

    case "image/png":
        //on ouvre l'image png
        // $imageSource = imagecreatefrompng($image);
        imagepng($nouvelleImage, __DIR__."/uploads/carre" .$fichier);
        break;

    case "image/jpeg":
        //on ouvre l'image
        // $imageSource = imagecreatefromjpeg($image);
        imagejpeg($nouvelleImage, __DIR__."/uploads/carre" .$fichier);
        break;

    case "image/gif":
        //on ouvre l'image
        // $imageSource = imagecreatefromgif($image);
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
    $src_x,  //position en x du coin superieur dans l'image source
    $src_y,  //position en y du coin superieur dans l'image source
    200,  //largeur de l'image de destination
    200,   //hauteur de l'image de destination
    $tailleCarre,       //largeur de l'image source
    $tailleCarre        //hauteur de l'image souce
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



