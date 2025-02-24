<?php
// mail(destinataire, sujet, message )
// mail("aubinborissimotsebo@gmail.com", "demande de participation", "bonjour monsieur j'espere que vous allez bien!");


$to="achillekenmogne@gmail.com";
$subject="changement";
$message="Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque ullam eligendi illum suscipit fuga autem saepe molestiae eos similique, molestias, explicabo sapiente incidunt quis nemo accusamus expedita. Fugit, quo ducimus";


//lorsque le nombre de caractere est superieur a 70, on fait le wprdwrap
//ainsi, $message=wordwrap($message, 70, "\r\n);

$message=wordwrap($message,70, "\r\n");
$headers=[
    "From"=>"aubin@gmail.com",  //le nom de la personne qui envoie le messsage
    "reply-To"=>"aubinsimo@gmail.com",  //a qui il repondra lorsque il aura resu le message
    "Cc"=>"copie@gmail.com",   //a  qui retournera le resultat de la copie du message
    "Bcc"=>"bcc@gmail.com", //a qui retournera le resultat de la copie cachee du message

    "Content-Type"=>"text/html; charset=UTF-8",
];

$mail($to, $subject, $message, $headers);
?>

